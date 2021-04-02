<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nomor = Nomor::where('status', null)->get();
        $toko = Toko::first(); 
        $nomor_terbaik = Nomor::where('status', null)->whereIn('operator', ['simpati', 'as'])->orderBy('harga', 'desc')->paginate(30);
        $nomor_termurah = Nomor::where('status', null)->whereIn('operator', ['simpati', 'as'])->orderBy('harga', 'asc')->paginate(30);
        $nomor_simpati = Nomor::where('status', null)->where('operator', 'simpati')->orderBy('harga', 'desc')->paginate(12);
        $nomor_kartu_as = Nomor::where('status', null)->where('operator', 'as')->orderBy('harga', 'desc')->paginate(12);
        $nomor_kartu_halo = Nomor::where('status', null)->where('operator', 'halo')->orderBy('harga', 'desc')->paginate(12);
        $nomor_three = Nomor::where('status', null)->where('operator', 'three')->orderBy('harga', 'desc')->paginate(12);
        $nomor_smartfren = Nomor::where('status', null)->where('operator', 'smartfren')->orderBy('harga', 'desc')->paginate(12);
        $nomor_axis = Nomor::where('status', null)->where('operator', 'axis')->orderBy('harga', 'desc')->paginate(12);
        $nomor_indosat = Nomor::where('status', null)->where('operator', 'indosat')->orderBy('harga', 'desc')->paginate(12);
        $nomor_xl = Nomor::where('status', null)->where('operator', 'xl')->orderBy('harga', 'desc')->paginate(12);
        // $nomor_for_title = Nomor::where('operator_id', $id)->first();
        // return view('operator', ['nomor' => $nomor_by_operator, 'nomorfortitle' => $nomor_for_title, 'toko' => $toko]);
        return view('index', ['nomor' => $nomor, 'toko' => $toko, 'nomor_terbaik' => $nomor_terbaik, 'nomor_termurah' => $nomor_termurah, 'nomor_simpati' => $nomor_simpati, 'nomor_kartu_as' => $nomor_kartu_as, 'nomor_kartu_halo' => $nomor_kartu_halo, 'nomor_three' => $nomor_three,'nomor_smartfren' => $nomor_smartfren, 'nomor_axis' => $nomor_axis, 'nomor_indosat' => $nomor_indosat, 'nomor_xl' => $nomor_xl,]); 
    }
 
}
