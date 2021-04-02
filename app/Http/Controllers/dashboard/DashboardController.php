<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nomor;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nomor = Nomor::count();
        $pelanggan = Pelanggan::count();
        $nomor_terjual = Nomor::where('status', 'Terjual')->count();
        $penjualan_rupiah = Nomor::where('status', 'Terjual')->sum('harga');
        return view('admin.index', ['data_nomor' => $nomor, 'nomor_terjual' => $nomor_terjual, 'pelanggan' => $pelanggan, 'penjualan_rupiah' => $penjualan_rupiah]);
    }
}
