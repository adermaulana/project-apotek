<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Obat;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function obat() {

        return $this->hasMany(Obat::class);

    }
}
