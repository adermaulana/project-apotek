<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Obat;
use App\Models\Pemasok;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pemasok(){
        return $this->belongsTo(Pemasok::class,'pemasok_id','id'); 
    }

    public function obat(){
        return $this->belongsTo(Obat::class,'obat_id','id'); 
    }


}
