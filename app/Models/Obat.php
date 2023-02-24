<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Suplier;
use Illuminate\Support\Carbon;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id'); 
    }
    
    public function unit(){
        return $this->belongsTo(Category::class,'unit_id','id'); 
    }

    public function suplier(){
        return $this->belongsTo(Category::class,'pemasok_id','id'); 
    }

    //carbon
    public function getCreatedAtAttribute()
    {

        return Carbon::parse($this->attributes['kadaluwarsa'])
           ->format('d M Y');
    }

}
