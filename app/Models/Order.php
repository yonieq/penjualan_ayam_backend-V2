<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'invoice', 'user_id', 'no_pengantar', 'nama_pengantar', 'status_order_id', 'metode_pembayaran', 'ongkir', 'biaya_cod', 'subtotal', 'pesan', 'no_hp'
    ];
}
