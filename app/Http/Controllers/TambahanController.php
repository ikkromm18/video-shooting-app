<?php

namespace App\Http\Controllers;

use App\Models\Tambahan;
use Illuminate\Http\Request;

class TambahanController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $tambahans = Tambahan::query()->when($search, function ($query, $search) {
            $query->where('nama_tambahan', 'like', '%' . $search . '%');
        })
            ->paginate(7);

        $data = [
            'tambahans' => $tambahans
        ];

        return view('admin.tambahan.tambahan-index', $data);
    }

    public function create()
    {
        return view('admin.tambahan.tambahan-create');
    }

    public function store(Request $request)
    {
        // Validasi
        $fields = $request->validate([
            'nama_tambahan' => 'required|max:255',
            'harga' => 'integer|required'
        ]);

        // Store Ke Database
        Tambahan::create($fields);

        // Redirect
        return redirect()->route('tambahan.index')->with('success', 'berhasil menambahkan data');
    }

    public function edit($id)
    {
        $tambahan = Tambahan::findOrFail($id);

        $data = [
            'tambahan' => $tambahan
        ];

        return view('admin.tambahan.tambahan-edit', $data);
    }

    public function update(Request $request, $id)
    {

        // Validasi
        $fields = $request->validate([
            'nama_tambahan' => 'required|max:255',
            'harga' => 'integer|required'
        ]);

        $tambahan = Tambahan::findOrFail($id);
        $tambahan->update($fields);

        return redirect()->route('tambahan.index')->with('success', 'berhasil mengubah data');
    }

    public function destroy($id)
    {
        $tambahan = Tambahan::findOrFail($id);

        $tambahan->delete();

        return redirect()->route('tambahan.index')->with('success', 'berhasil meghapus data');
    }
}
