<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function submit_register(Request $request)
    {
        // Validasi
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        // Register
        $user = User::Create($fields);

        // Login
        // Auth::login($user);

        // Redirect
        return redirect()->route('login')->with('success', 'Register Berhasil, Silahkan Login');
    }

    public function submit_login(Request $request)
    {
        // Validasi
        $fields = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|min:5',
        ]);

        // Login

        if (Auth::attempt($fields, $request->remember)) {

            $request->session()->regenerate();

            return redirect()->intended();
        } else {
            return back()->with('error', 'Email atau Password Salah');
        }
    }
    public function logout(Request $request)
    {
        // Logout
        Auth::logout();

        // Menghapus Seluruh Data Session Lama
        $request->session()->invalidate();

        // Mereset CRSF Token
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Log Out Berhasil');
    }
}
