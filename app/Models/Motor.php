<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = ['merek', 'tipe', 'deskripsi', 'no_plat', 'rent_price', 'rilis'];
}
