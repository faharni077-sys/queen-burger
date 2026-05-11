<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // INI KUNCINYA! Tambahkan baris ini biar Laravel kasih izin
    protected $fillable = [
        'nama_burger',
        'total_harga',
        'metode_bayar',
        'status',
    ];
}