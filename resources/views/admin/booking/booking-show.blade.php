@extends('layouts.admin')
@section('title', 'Show Details')
@section('content')

    <div class="">
        {{-- Breadcrumb --}}
        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Booking', 'url' => route('booking.index')],
            ['label' => 'Detail'],
        ]" />

        {{-- Alert --}}
        @include('components.alert')

        {{-- Page Title --}}
        <x-admin.page-title title="Detail Data" />

        {{-- Action Button --}}
        <div class="flex flex-row w-full justify-between mb-4">
            {{-- <x-admin.add-button href="{{ route('booking.terima', $booking->id) }}" label="Terima" /> --}}
            <form action="{{ route('booking.terima', $booking->id) }}" method="post">
                @csrf
                <x-submit-button label="Terima" />
            </form>
            <div class="">
                {{-- <x-admin.add-button href="{{ route('booking.edit', $booking->id) }}" label="Edit Booking" /> --}}
                <x-alternative-button href="{{ route('booking.destroy', $booking->id) }}" label="Tolak" />
            </div>
        </div>

        {{-- Detail Box --}}
        <div class="border border-gray-300 rounded-md w-full">
            <div class="bg-[#2B5A9E]  text-white border-b border-gray-300 text-center font-semibold py-2">
                Daftar Booking
            </div>

            {{-- Detail Item --}}
            @php
                $details = [
                    'Nama' => $booking->nama,
                    'Email' => $booking->email,
                    'Nomor HP' => $booking->no_hp,
                    'Layanan' => $booking->layanan->nama_layanan,
                    'Tambahan' => $booking->tambahan->nama_tambahan,
                    'Tanggal Acara' => $booking->tgl_acara,
                    'Alamat' => $booking->alamat,
                    'Harga' => $booking->total_harga,
                    'Status' => ucfirst($booking->status),
                    'Keterangan' => $booking->keterangan,
                ];
            @endphp

            {{-- Loop data text --}}
            @foreach ($details as $label => $value)
                <div class="flex border-t border-gray-200">
                    <div class="w-1/3 p-2 font-medium bg-gray-50">{{ $label }}</div>
                    <div class="w-1/12 p-2 text-center">:</div>
                    <div class="w-7/12 p-2">{{ $value }}</div>
                </div>
            @endforeach

            <div class="grid grid-cols-2">
                {{-- Tampilkan bukti DP jika ada --}}
                @if ($booking->bukti_dp)
                    <div class="flex border-t border-gray-200">
                        <div class="w-1/3 p-2 font-medium bg-gray-50">Foto Bukti DP</div>
                        <div class="w-1/12 p-2 text-center">:</div>
                        <div class="w-5/12 p-2">
                            <img src="{{ asset($booking->bukti_dp) }}" alt="Bukti DP" class="max-w-xs rounded border">
                        </div>
                    </div>
                @endif

                {{-- Tampilkan bukti pelunasan jika ada --}}
                @if ($booking->bukti_pelunasan)
                    <div class="flex border-t border-gray-200">
                        <div class="w-1/3 p-2 font-medium bg-gray-50">Foto Bukti Pelunasan</div>
                        <div class="w-1/12 p-2 text-center">:</div>
                        <div class="w-5/12 p-2">
                            <img src="{{ asset($booking->bukti_pelunasan) }}" alt="Bukti Pelunasan"
                                class="max-w-xs rounded border">
                        </div>
                    </div>
                @endif
            </div>


        </div>
    </div>

@endsection
