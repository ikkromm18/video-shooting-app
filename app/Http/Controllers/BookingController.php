<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Tambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::whereNotIn('status', ['menunggu', 'batal'])
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->paginate(7)
            ->through(function ($booking) {
                $booking->url_detail = route('booking.show.noted', $booking->id);
                return $booking;
            });

        return view('admin.booking.booking-index', [
            'bookings' => $bookings,
            'title' => 'Bookings',
            'pagetitle' => 'Daftar Booking'
        ]);
    }


    public function pending(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::where('status', 'menunggu')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->paginate(7)
            ->through(function ($booking) {
                $booking->url_detail = route('booking.show', $booking->id);
                return $booking;
            });

        return view('admin.booking.booking-index', [
            'bookings' => $bookings,
            'title' => 'Bookings Pending',
            'pagetitle' => 'Daftar Booking Menunggu'
        ]);
    }


    public function batal(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::where('status', 'batal')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->paginate(7)
            ->through(function ($booking) {
                $booking->url_detail = route('booking.show', $booking->id);
                return $booking;
            });

        return view('admin.booking.booking-index', [
            'bookings' => $bookings,
            'title' => 'Bookings Batal',
            'pagetitle' => 'Daftar Booking Dibatalkan'
        ]);
    }


    public function create() {}

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'layanan_id' => 'required|exists:layanans,id',
            'tambahan_id' => 'nullable|exists:tambahans,id',
            'tgl_acara' => 'required|date|after_or_equal:today',
            'total_harga' => 'required|integer|min:0',
        ]);

        // Simpan data booking
        Booking::create([
            'user_id' => Auth::id(),
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'layanan_id' => $validated['layanan_id'],
            'tambahan_id' => $validated['tambahan_id'] ?? null,
            'tgl_acara' => $validated['tgl_acara'],
            'total_harga' => $validated['total_harga'],
            'status' => 'menunggu', // default status booking
        ]);

        return redirect()->back()->with('success', 'Booking berhasil disimpan! Kami akan segera menghubungi Anda.');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        $data = [
            'booking' => $booking
        ];

        return view('admin.booking.booking-show', $data);
    }

    public function showNoted($id)
    {
        $booking = Booking::findOrFail($id);

        $layanans = Layanan::all();
        $tambahans = Tambahan::all();

        $data = [
            'booking' => $booking,
            'layanans' => $layanans,
            'tambahans' => $tambahans,
        ];

        return view('admin.booking.booking-show-noted', $data);
    }

    public function edit() {}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:500',
            'tgl_acara' => 'required|date',
            'keterangan' => 'nullable|string',
            'jumlah_dp' => 'nullable|numeric',
            'jumlah_pelunasan' => 'nullable|numeric',
            'layanan_id' => 'required|exists:layanans,id',
            'tambahan_id' => 'nullable|exists:tambahans,id',
            'status' => 'required|in:noted,DP,lunas,batal',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->nama = $request->nama;
        $booking->email = $request->email;
        $booking->no_hp = $request->no_hp;
        $booking->alamat = $request->alamat;
        $booking->tgl_acara = $request->tgl_acara;
        $booking->keterangan = $request->keterangan;
        $booking->jumlah_dp = $request->jumlah_dp;
        $booking->jumlah_pelunasan = $request->jumlah_pelunasan;
        $booking->layanan_id = $request->layanan_id;
        $booking->tambahan_id = $request->tambahan_id;
        $booking->status = $request->status;

        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Data booking berhasil diperbarui.');
    }

    public function destroy() {}

    public function terima($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'noted';
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Booking telah diterima.');
    }
}
