<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;

class OperatorController extends Controller
{
    public function index($id)
    {
        $toko = Toko::first();  
        $nomor_by_operator = Nomor::where('operator', $id)->where('status', null)->get();
        $nomor_by_3jt = $nomor_by_operator->whereBetween('harga', [3000000, 10000000]);
        $nomor_by_2jt = $nomor_by_operator->whereBetween('harga', [2000000, 2999000]);
        $nomor_by_1jt = $nomor_by_operator->whereBetween('harga', [1000000, 1500000]);
        $nomor_by_1_5jt = $nomor_by_operator->whereBetween('harga', [1500000, 1999000]);
        $nomor_by_500k = $nomor_by_operator->whereBetween('harga', [500000, 999000]);
        $nomor_by_100k = $nomor_by_operator->whereBetween('harga', [100000, 499000]);
        $nomor_for_title = Nomor::where('operator', $id)->first();
        return view('operator', ['toko' => $toko, 'nomor_for_title' => $nomor_for_title, 'nomor_by_3jt' => $nomor_by_3jt, 'nomor_by_2jt' => $nomor_by_2jt, 'nomor_by_1_5jt' => $nomor_by_1_5jt, 'nomor_by_1jt' => $nomor_by_1jt, 'nomor_by_500k' => $nomor_by_500k, 'nomor_by_100k' => $nomor_by_100k]); 
    }
}
 