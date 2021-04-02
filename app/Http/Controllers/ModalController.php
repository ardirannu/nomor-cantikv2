<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index($id)
    {
        $nomor = Nomor::find($id);
        $toko = Toko::first();
        return view('modal-nomor', ['nomor' => $nomor, 'toko' => $toko]);
    }
}
