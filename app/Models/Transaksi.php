<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_toko',
        'id_user',
        'total_barang',
        'total_harga',
        'status',
    ];

        public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
