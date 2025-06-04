@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    @auth
        Admin Sudah Login
    @endauth

    @guest
        Ini Adalah Halaman Admin
    @endguest

@endsection
