@extends('layouts.admin')
@section('title', 'Tambah Layanan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Layanan', 'url' => route('layanan.index')],
            ['label' => 'Tambah Layanan'],
        ]" />

        <x-admin.page-title title="Tambah Layanan" />



        <div class="max-w-sm mt-4">
            <form action="{{ route('layanan.store') }}" method="post">
                @csrf
                <x-input name="nama_layanan" label="Nama Layanan" type="text" value="{{ old('nama_layanan') }}" />
                <x-input name="harga" label="Harga Layanan" type="number" placeholder="Masukkan Harga"
                    value="{{ old('harga') }}" />
                <x-submit-button />
            </form>
        </div>



    </div>

@endsection
