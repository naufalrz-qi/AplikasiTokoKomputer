<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_barang)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id.*' => 'required|exists:barang,id_barang',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $totalHarga = 0;

        // Buat instance Pembelian
        $pembelian = new Pembelian();
        $pembelian->tanggal = now();
        $pembelian->user_id = $user->id;
        $pembelian->total_harga_barang = 0; // Akan diperbarui setelah menghitung subtotal
        $pembelian->status = 'pending';
        $pembelian->save(); // Simpan data pembelian

        foreach ($validatedData['barang_id'] as $index => $idBarang) {
            $barang = Barang::where('id_barang', $idBarang)->first();
            $jumlah = $validatedData['jumlah'][$index];
            $subtotal = $barang->harga * $jumlah;
            $totalHarga += $subtotal;

            // Buat instance PembelianDetail
            $pembelianDetail = new PembelianDetail();
            $pembelianDetail->id_beli = $pembelian->id_beli; // Ambil id_beli dari Pembelian yang baru saja disimpan
            $pembelianDetail->id_barang = $idBarang;
            $pembelianDetail->jumlah = $jumlah;
            $pembelianDetail->subtotal = $subtotal;
            $pembelianDetail->save(); // Simpan data pembelian detail
        }

        // Update total harga setelah perhitungan subtotal
        $pembelian->total_harga_barang = $totalHarga;
        $pembelian->save();

        return redirect()->route('payment.index', $pembelian->id_beli)->with('success', 'Pemesanan berhasil dilakukan. Silakan lanjutkan ke pembayaran.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id_beli)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_beli)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_beli)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_beli)
    {

    }

    public function paymentIndex($pembelianId)
    {
        $pembelian = Pembelian::with('details.barang')->findOrFail($pembelianId);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $pembelian->id_beli,
                'gross_amount' => $pembelian->total_harga_barang,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];


            $snapToken = Snap::getSnapToken($params);
            return view('templates.user.payment.index', compact('pembelian', 'snapToken'));

    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $order_id = $request->order_id;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $transaction_status = $request->transaction_status;

        $hashed = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

        if ($hashed === $request->signature_key) { // Validasi signature key
            $pembelian = Pembelian::findOrFail($order_id);

            if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
                $pembelian->status = 'approved';
            } elseif (in_array($transaction_status, ['deny', 'expire', 'cancel'])) {
                $pembelian->status = 'rejected';
            }

            $pembelian->save();

            return response()->json(['status' => 'success', 'message' => 'Transaction status updated']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
    }


}
