@extends('layouts.admin')
@section('title', 'Edit Layanan Tambahan')
@section('content')

    <div class="">

        <x-admin.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Layanan', 'url' => route('layanan.index')],
            ['label' => 'Edit Layanan'],
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
