<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('templates.admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('templates.admin.barang.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_barang' => 'required|string|max:30|unique:barang,id_barang',
            'nama_barang' => 'required|string|max:50',
            'merek' => 'required|string|max:20',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'rincian_barang' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Handle upload gambar
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/uploads/img/barang'), $filename);
        }

        // Simpan data barang
        Barang::create([
            'id_barang' => $request->input('id_barang'),
            'nama_barang' => $request->input('nama_barang'),
            'merek' => $request->input('merek'),
            'gambar' => $filename ? 'assets/uploads/img/barang/' . $filename : null,
            'rincian_barang' => $request->input('rincian_barang'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'kategori_id' => $request->input('kategori_id'),
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('templates.user.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('templates.admin.barang.edit', compact('barang', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:50',
            'merek' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'rincian_barang' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $barang = Barang::findOrFail($id);

        // Handle upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && File::exists(public_path($barang->gambar))) {
                File::delete(public_path($barang->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/uploads/img/barang'), $filename);
            $barang->gambar = 'assets/uploads/img/barang/' . $filename;
        }

        // Update data barang tanpa memperbarui kolom gambar jika tidak ada gambar baru
        $barang->update($request->except('gambar'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
