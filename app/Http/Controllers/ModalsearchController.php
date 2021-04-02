<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;
use Illuminate\Http\Request;

class ModalsearchController extends Controller
{ 
    public function index($id)
    {
        $nomor = Nomor::find($id);
        $toko = Toko::first();
        return view('modal-search', ['nomor' => $nomor, 'toko' => $toko]);
    }
}
