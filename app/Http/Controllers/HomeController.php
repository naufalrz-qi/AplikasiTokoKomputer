<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('templates.user.home', compact('barangs'));
    }

    public function adminDashboard()
    {
        return view('templates.admin.dashboard');
    }
}
