@extends('layouts.admin')
@section('title', 'Show Details')
@section('content')

    <div class="">
        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Booking', 'url' => route('booking.index')],
            ['label' => 'Detail'],
        ]" />

        @include('components.alert')

        <x-admin.page-title title="Edit Data Booking" />

        <form action="{{ route('booking.update', $booking->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div class="border border-gray-300 rounded-md w-full">
                <div class="bg-[#2B5A9E] text-white border-b border-gray-300 text-center font-semibold py-2">
                    Form Booking
                </div>

                @php
                    $fields = [
                        'nama' => 'Nama',
                        'email' => 'Email',
                        'no_hp' => 'Nomor HP',
                        'alamat' => 'Alamat',
                        'tgl_acara' => 'Tanggal Acara',
                        'keterangan' => 'Keterangan',
                        'jumlah_dp' => 'Jumlah DP',
                        'jumlah_pelunasan' => 'Jumlah Pelunasan',
                    ];
                @endphp

                @foreach ($fields as $name => $label)
                    <div class="flex border-t border-gray-200">
                        <label class="w-1/3 p-2 font-medium bg-gray-50" for="{{ $name }}">{{ $label }}</label>
                        <div class="w-2/3 p-2">
                            <input type="{{ $name == 'tgl_acara' ? 'date' : 'text' }}" name="{{ $name }}"
                                id="{{ $name }}" value="{{ old($name, $booking->$name) }}"
                                class="w-full border rounded px-2 py-1" />
                        </div>
                    </div>
                @endforeach

                {{-- Layanan --}}
                <div class="flex border-t border-gray-200">
                    <label class="w-1/3 p-2 font-medium bg-gray-50">Layanan</label>
                    <div class="w-2/3 p-2">
                        <select name="layanan_id" class="w-full border rounded px-2 py-1">
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}"
                                    {{ old('layanans_id', $booking->layanan_id) == $layanan->id ? 'selected' : '' }}>
                                    {{ $layanan->nama_layanan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Tambahan --}}
                <div class="flex border-t border-gray-200">
                    <label class="w-1/3 p-2 font-medium bg-gray-50">Tambahan</label>
                    <div class="w-2/3 p-2">
                        <select name="tambahan_id" class="w-full border rounded px-2 py-1">
                            @foreach ($tambahans as $tambahan)
                                <option value="{{ $tambahan->id }}"
                                    {{ old('tambahans_id', $booking->tambahan_id) == $tambahan->id ? 'selected' : '' }}>
                                    {{ $tambahan->nama_tambahan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                {{-- Harga --}}
                <div class="flex border-t border-gray-200">
                    <label class="w-1/3 p-2 font-medium bg-gray-50">Harga</label>
                    <div class="w-2/3 p-2">
                        <input type="text" value="{{ 'Rp ' . number_format($booking->total_harga, 0, ',', '.') }}"
                            readonly class="w-full border rounded px-2 py-1 bg-gray-100" />
                    </div>
                </div>

                {{-- Status --}}
                <div class="flex border-t border-gray-200">
                    <label class="w-1/3 p-2 font-medium bg-gray-50">Status</label>
                    <div class="w-2/3 p-2">
                        <select name="status" class="w-full border rounded px-2 py-1">
                            @foreach (['noted', 'DP', 'lunas', 'batal'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $booking->status) === $status ? 'selected' : '' }}>
                                    {{ ucfirst(strtolower($status)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Bukti DP --}}
                @if ($booking->bukti_dp)
                    <div class="flex border-t border-gray-200">
                        <label class="w-1/3 p-2 font-medium bg-gray-50">Foto Bukti DP</label>
                        <div class="w-2/3 p-2">
                            <img src="{{ asset($booking->bukti_dp) }}" class="max-w-xs rounded border mb-2">
                        </div>
                    </div>
                @endif

                {{-- Bukti Pelunasan --}}
                @if ($booking->bukti_pelunasan)
                    <div class="flex border-t border-gray-200">
                        <label class="w-1/3 p-2 font-medium bg-gray-50">Foto Bukti Pelunasan</label>
                        <div class="w-2/3 p-2">
                            <img src="{{ asset($booking->bukti_pelunasan) }}" class="max-w-xs rounded border mb-2">
                        </div>
                    </div>
                @endif
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex justify-end gap-2">
                <x-submit-button label="Simpan" />
            </div>
        </form>
    </div>

@endsection
