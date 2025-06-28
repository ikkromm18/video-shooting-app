@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

    <x-toast />

    <x-hero />

    <x-tentang />

    <x-layanan />

    <x-portfolio />

    <x-testimoni />

    <x-pricing />

    <x-faq />

    @auth

        <x-contact :layanans="$layanans" :tambahans="$tambahans" />
    @endauth



@endsection
