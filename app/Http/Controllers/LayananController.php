<?php

namespace App\Http\Controllers;


use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $layanans = Layanan::query()->when($search, function ($query, $search) {
            $query->where('nama_layanan', 'like', '%' . $search . '%');
        })
            ->paginate(7);

        $data = [
            'layanans' => $layanans
        ];

        return view('admin.layanan.layanan-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.layanan-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi
        $fields = $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|integer',
        ]);

        // Store ke Database
        Layanan::create($fields);


        // Redirect
        return redirect()->route('layanan.index')->with('success', 'berhasil menambahkan data');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        $data = [
            'layanan' => $layanan
        ];

        return view('admin.layanan.layanan-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Validasi
        $fields = $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|integer',
        ]);

        //    update
        $layanan = Layanan::findOrFail($id);
        $layanan->update($fields);

        // redirect
        return redirect()->route('layanan.index')->with('success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $layanan = Layanan::findorFail($id);

        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'berhasil meghapus data');
    }
}
