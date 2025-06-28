@extends('layouts.user')
@section('dashboard-content')
    <div class="max-w-md mx-auto bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Profil Saya</h2>
        <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <a href="{{ route('user.profile.edit') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Edit
            Profil</a>
    </div>
@endsection
