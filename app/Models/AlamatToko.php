<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatToko extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'kabupaten_id', 'kecamatan_id', 'detail'
    ];
}
