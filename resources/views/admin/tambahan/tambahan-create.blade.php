@extends('layouts.admin')
@section('title', 'Tambah Layanan Tambahan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Layanan Tambahan', 'url' => route('tambahan.index')],
            ['label' => 'Tambah Layanan Tambahan'],
        ]" />

        <x-admin.page-title title="Tambah Layanan Tambahan" />

        <div class="max-w-sm mt-4">
            <form action="{{ route('tambahan.store') }}" method="post">
                @csrf
                <x-input name="nama_tambahan" label="Nama Layanan Tambahan" type="text" value="{{ old('nama_tambahan') }}" />
                <x-input name="harga" label="Harga Layanan" type="number" placeholder="Masukkan Harga"
                    value="{{ old('harga') }}" />
                <x-submit-button />
            </form>
        </div>



    </div>

@endsection
