<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';

    protected $fillable = ['nama', 'alamat', 'detail_rekening', 'link_tokped', 'link_lazada', 'link_shopee', 'link_bukalapak', 'no_whatsapp'];
}
