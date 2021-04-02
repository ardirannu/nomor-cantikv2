<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;


class Nomor extends Model 
{
    protected $table = 'nomor';

    protected $fillable = ['detail_nomor', 'operator', 'harga', 'jumlah_digit'];

    public function operator(){
        return $this->belongsTo('App\Models\Operator');
    }    

    public function pelanggan(){
        return $this->hasMany('App\Models\Pelanggan'); 
    }   
}
