<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Tambahan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        $tambahans = Tambahan::all();

        $data = [
            'layanans' => $layanans,
            'tambahans' => $tambahans
        ];

        return view('front-end', $data);
    }
}
