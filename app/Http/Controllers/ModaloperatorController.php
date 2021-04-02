<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;
use Illuminate\Http\Request;

class ModaloperatorController extends Controller
{
    public function index($id) 
    {
        $nomor = Nomor::find($id);
        $toko = Toko::first();
        return view('modal-nomor-operator', ['nomor' => $nomor, 'toko' => $toko]);
    }
}
