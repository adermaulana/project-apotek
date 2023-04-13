<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Obat;
use App\Traits\HasFormatRupiah;

class Penjualan extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    
    protected $guarded = ['id'];

    public function obat(){
        return $this->belongsTo(Obat::class,'obat_id','id'); 
    }

}
