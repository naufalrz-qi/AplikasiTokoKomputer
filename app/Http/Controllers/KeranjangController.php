<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $keranjangItems = Keranjang::where('user_id', $user->id)->get();
        return view('templates.user.keranjang.index', compact('keranjangItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_barang)
    {
        $user = Auth::user();
        $barang = Barang::where('id_barang', $id_barang)->first();

        // Cek apakah barang sudah ada di keranjang
        $itemKeranjang = Keranjang::where('user_id', $user->id)->where('id_barang', $id_barang)->first();

        if ($itemKeranjang) {
            // Jika sudah ada, tambahkan jumlahnya
            $itemKeranjang->jumlah += 1;
            $itemKeranjang->save();
        } else {
            // Jika belum ada, tambahkan sebagai item baru
            Keranjang::create([
                'user_id' => $user->id,
                'id_barang' => $barang->id_barang,
                'jumlah' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    /**
     * Display the specified resource.
     */
    public function checkout()
    {
        $user = Auth::user();
        $keranjangItems = Keranjang::where('user_id', $user->id)->get();

        if ($keranjangItems->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        return view('templates.user.keranjang.checkout', compact('keranjangItems'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $itemKeranjang = Keranjang::where('id', $id)->where('user_id', $user->id)->first();

        if ($itemKeranjang) {
            $itemKeranjang->jumlah = max(1, (int)$request->jumlah); // Minimal jumlah 1
            $itemKeranjang->save();

            return response()->json(['success' => true, 'message' => 'Jumlah barang berhasil diperbarui.']);
        }

        return response()->json(['success' => false, 'message' => 'Item tidak ditemukan di keranjang.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $itemKeranjang = Keranjang::where('id', $id)->where('user_id', $user->id)->first();

        if ($itemKeranjang) {
            $itemKeranjang->delete();
        }

        return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang.');
    }
}
