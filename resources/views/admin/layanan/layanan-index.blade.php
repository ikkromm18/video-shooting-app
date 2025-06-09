@extends('layouts.admin')
@section('title', 'Layanan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[['label' => 'Home', 'url' => route('dashboard')], ['label' => 'Layanan']]" />

        @include('components.alert')

        <x-admin.page-title title="Layanan" />

        <div class="flex flex-row w-full justify-between">
            <x-admin.search-button name="search" placeholder="Cari layanan..." />
            <x-admin.add-button href="{{ route('layanan.create') }}" />
        </div>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Nama Layanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
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
                    @foreach ($layanans as $layanan)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                {{ $loop->iteration + ($layanans->currentPage() - 1) * $layanans->perPage() }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $layanan->nama_layanan }}
                            </th>

                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($layanan->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('layanan.edit', $layanan->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                <form action="{{ route('layanan.destroy', $layanan->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $layanans->appends(['search' => request('search')])->links() }}
        </div>

    </div>

@endsection
