@extends('layouts.admin')
@section('title', 'Edit Layanan Tambahan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Layanan Tambahan', 'url' => route('tambahan.index')],
            ['label' => 'Edit Layanan Tambahan'],
        ]" />

        <x-admin.page-title title="Edit Layanan" />



        <div class="max-w-sm mt-4">
            <form action="{{ route('tambahan.update', $tambahan->id) }}" method="post">
                @csrf
                @method('PUT')
                <x-input name="nama_tambahan" label="Nama Layanan Tambahan" type="text"
                    value="{{ $tambahan->nama_tambahan }}" />
                <x-input name="harga" label="Harga Layanan Tambahan" type="number" placeholder="Masukkan Harga"
                    value="{{ $tambahan->harga }}" />
                <x-submit-button label="Update" />
            </form>
        </div>



    </div>

@endsection
