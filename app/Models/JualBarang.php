<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'jumlah_barang',
        'total_harga',
    ];
}
