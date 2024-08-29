<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pembelian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('templates.user.home', compact('barangs'));
    }

    public function adminDashboard()
    {
        // Total kategori
        $totalKategori = Kategori::count() ?? 0;

        // Total user
        $totalUser = User::count() ?? 0;

        // Total barang
        $totalBarang = Barang::count() ?? 0;

        // Jumlah transaksi bulan ini
        $jumlahTransaksiBulanIni = Pembelian::whereMonth('tanggal', date('m'))
                                            ->whereYear('tanggal', date('Y'))
                                            ->count() ?? 0;

        // Total pendapatan bulan ini
        $totalPendapatanBulanIni = Pembelian::whereMonth('tanggal', date('m'))
                                            ->whereYear('tanggal', date('Y'))
                                            ->sum('total_harga_barang') ?? 0;

        // Mengambil data penjualan bulanan
        $salesData = DB::table('pembelian')
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('SUM(total_harga_barang) as total_sales'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total_sales', 'month')
            ->toArray();

        // Menyusun data untuk setiap bulan (Jan - Des)
        $salesPerMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $salesPerMonth[] = $salesData[$i] ?? 0;  // Jika tidak ada data di bulan tersebut, set ke 0
        }

        // Mengambil aktivitas terbaru
        $recentActivities = collect();

        // Barang baru ditambahkan
        $recentBarang = Barang::orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'barang',
                    'message' => 'Barang baru ditambahkan: ' . $item->nama_barang,
                    'time' => $item->created_at->diffForHumans(),
                    'icon' => 'fas fa-box',
                    'badge' => 'bg-success'
                ];
            }) ?? collect();

        // Pembelian berhasil
        $recentPembelian = Pembelian::orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'pembelian',
                    'message' => 'Pembelian berhasil dengan ID: ' . $item->id_beli,
                    'time' => $item->created_at->diffForHumans(),
                    'icon' => 'fas fa-shopping-cart',
                    'badge' => 'bg-info'
                ];
            }) ?? collect();

        // Pengguna baru terdaftar
        $recentUsers = User::orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'user',
                    'message' => 'Pengguna baru terdaftar: ' . $item->name,
                    'time' => $item->created_at->diffForHumans(),
                    'icon' => 'fas fa-user-plus',
                    'badge' => 'bg-warning'
                ];
            }) ?? collect();

        // Gabungkan semua aktivitas
        $recentActivities = $recentActivities->merge($recentBarang)
            ->merge($recentPembelian)
            ->merge($recentUsers)
            ->sortByDesc('time')
            ->take(5);

        // Mengirim data ke view
        return view('templates.admin.dashboard', compact(
            'totalKategori',
            'totalUser',
            'totalBarang',
            'jumlahTransaksiBulanIni',
            'totalPendapatanBulanIni',
            'salesPerMonth',
            'recentActivities'
        ));
    }

}
