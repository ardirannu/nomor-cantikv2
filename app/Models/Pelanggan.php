<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan'; 

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'no_hp', 'nomor_id'];

    public function nomor(){
        return $this->belongsTo('App\Models\Nomor');
    }    
}
 