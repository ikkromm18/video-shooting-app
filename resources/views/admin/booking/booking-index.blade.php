@extends('layouts.admin')
@section('title', $title)
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('dashboard')], ['label' => 'Booking']]" />

        @include('components.alert')

        <x-admin.page-title title="{{ $pagetitle }}" />

        <div class="flex flex-row w-full justify-between">
            <x-admin.search-button name="search" placeholder="Cari booking..." />
            {{-- <x-admin.add-button href="{{ route('booking.create') }}" label="Tambah Booking" /> --}}
        </div>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Tanggal Acara
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Layanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tambahan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                {{ $loop->iteration + ($bookings->currentPage() - 1) * $bookings->perPage() }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $booking->tgl_acara }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $booking->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $booking->layanan->nama_layanan }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $booking->tambahan->nama_tambahan }}
                            </td>

                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($booking->total_harga, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $booking->status }}
                            </td>

                            <td class="px-6 py-4 flex gap-2">

                                <a href="{{ $booking->url_detail }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>

                                {{-- <a href="{{ route('booking.edit', $booking->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                <form action="{{ route('booking.destroy', $booking->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>

                                </form> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $bookings->appends(['search' => request('search')])->links() }}
        </div>

    </div>

@endsection
