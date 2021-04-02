<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator'; 

    protected $fillable = ['nama']; 

    public function nomor(){
        return $this->hasMany('App\Models\Nomor');
    }    
}
