<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return "Ini Halaman User";
    }
    // Tampilkan halaman dashboard utama user
    public function dashboard()
    {
        $inisial = strtoupper(substr(Auth::user()->name, 0, 1));
        return view('user.dashboard', compact('inisial'));
    }

    // Tampilkan halaman profile user
    public function profile()
    {
        return view('user.profile');
    }

    // Tampilkan halaman edit profile
    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit-profile', compact('user'));
    }

    // Update data profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    // Tampilkan riwayat booking milik user
    public function riwayat()
    {
        $bookings = Booking::with(['layanan', 'tambahan'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $adminPhone = '6281234567890'; // Ganti dengan nomor WhatsApp admin
        return view('user.riwayat', compact('bookings', 'adminPhone'));
    }

    // (Opsional) Tampilkan form ubah password
    public function showPasswordForm()
    {
        return view('user.change-password');
    }

    // (Opsional) Proses ubah password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.profile')->with('success', 'Password berhasil diubah.');
    }

    public function uploadDp(Request $request, $id)
    {
        $request->validate([
            'bukti_dp' => 'required|image|max:2048',
        ]);

        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $file = $request->file('bukti_dp');
        $tanggal = now()->format('d-m-Y');
        $userId = Auth::id();

        // Hitung urutan file untuk user ini pada hari ini
        $urutan = Booking::where('user_id', $userId)
            ->whereDate('updated_at', now()->toDateString())
            ->whereNotNull('bukti_dp')
            ->count() + 1;

        $ext = $file->getClientOriginalExtension();
        $filename = "{$tanggal}-{$userId}-{$urutan}.{$ext}";

        $file->move(public_path('buktidp'), $filename);

        $booking->update([
            'bukti_dp' => "buktidp/{$filename}",
        ]);

        return redirect()->back()->with('success', 'Bukti DP berhasil diupload.');
    }



    public function uploadLunas(Request $request, $id)
    {
        $request->validate([
            'bukti_pelunasan' => 'required|image|max:2048',
        ]);

        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $file = $request->file('bukti_pelunasan');
        $tanggal = now()->format('d-m-Y');
        $userId = Auth::id();

        // Hitung urutan file untuk user ini pada hari ini
        $urutan = Booking::where('user_id', $userId)
            ->whereDate('updated_at', now()->toDateString())
            ->whereNotNull('bukti_pelunasan')
            ->count() + 1;

        $ext = $file->getClientOriginalExtension();
        $filename = "{$tanggal}-{$userId}-{$urutan}.{$ext}";

        $file->move(public_path('buktilunas'), $filename);

        $booking->update([
            'bukti_pelunasan' => "buktilunas/{$filename}",
        ]);

        return redirect()->back()->with('success', 'Bukti pelunasan berhasil diupload.');
    }
}
