@extends('layouts.admin')
@section('title', 'Edit Layanan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Layanan', 'url' => route('layanan.index')],
            ['label' => 'Edit Layanan'],
        ]" />

        <x-admin.page-title title="Edit Layanan" />



        <div class="max-w-sm mt-4">
            <form action="{{ route('layanan.update', $layanan->id) }}" method="post">
                @csrf
                @method('PUT')
                <x-input name="nama_layanan" label="Nama Layanan" type="text" value="{{ $layanan->nama_layanan }}" />
                <x-input name="harga" label="Harga Layanan" type="number" placeholder="Masukkan Harga"
                    value="{{ $layanan->harga }}" />
                <x-submit-button label="Update" />
            </form>
        </div>



    </div>

@endsection
