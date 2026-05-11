<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [

    'nama_burger',
    'total_harga',
    'cheese_qty',
    'patty_qty',
    'roti'

];
}
