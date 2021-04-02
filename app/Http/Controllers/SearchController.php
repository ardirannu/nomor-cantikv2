<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $toko = Toko::first();  
        $nomor = $request->nomor;
        $operator = $request->operator;
        $digit = $request->digit;
        $order = $request->orderby;
        $kisaran = $request->kisaran;
        $posisi = $request->posisi;

        //search by nomor, operator, jumlah digit, posisi, order
         //search by posisi
         if ($posisi == 'depan') {
            if ($order == 1) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".$nomor."%".'________'."%")->orderBy('harga', 'asc')->paginate(20);
            }elseif ($order == 2) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".$nomor."%".'________'."%")->orderBy('harga', 'desc')->paginate(20);
            }else {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".$nomor."%".'________'."%")->paginate(20);
            }
        }elseif ($posisi == 'tengah') {
            if ($order == 1) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'____'."%".$nomor."%".'____'."%")->orderBy('harga', 'asc')->paginate(20);
            }elseif ($order == 2) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'____'."%".$nomor."%".'____'."%")->orderBy('harga', 'desc')->paginate(20);
            }else {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'____'."%".$nomor."%".'____'."%")->paginate(20);
            }
         }elseif ($posisi == 'belakang') {
             if ($order == 1) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'________'."%".$nomor."%")->orderBy('harga', 'asc')->paginate(20);
             }elseif ($order == 2) {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'________'."%".$nomor."%")->orderBy('harga', 'desc')->paginate(20);
             }else {
                $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->where('detail_nomor','like',"%".'________'."%".$nomor."%")->paginate(20);
             }
         }else {
            $search = Nomor::where('detail_nomor','like',"%".$nomor."%")->where('operator','like',"%".$operator."%")->where('jumlah_digit','like',"%".$digit."%")->paginate(20);
         }

        //search by kisaran harga
        if ($kisaran == 1) {
            $search_by_kisaran = $search->whereBetween('harga', [100000, 300000]);
        }elseif ($kisaran == 2) {
            $search_by_kisaran = $search->whereBetween('harga', [300000, 500000]);
        }elseif ($kisaran == 3) {
            $search_by_kisaran = $search->whereBetween('harga', [500000, 1000000]);
        }elseif ($kisaran == 4) {
            $search_by_kisaran = $search->whereBetween('harga', [1000000, 3000000]);
        }elseif ($kisaran == 5) {
            $search_by_kisaran = $search->whereBetween('harga', [3000000, 10000000]);
        }else {
            $search_by_kisaran = $search;
        }

        return view('search',['search' => $search_by_kisaran, 'toko' => $toko]);
    }
}
