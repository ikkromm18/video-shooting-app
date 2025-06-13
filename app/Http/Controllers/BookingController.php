<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::query()->when($search, function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%');
        })
            ->paginate(7);

        $data = [
            'bookings' => $bookings
        ];

        return view('admin.booking.booking-index', $data);
    }
}
