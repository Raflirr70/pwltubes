<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_toko',
        'jumlah_barang',
        'total_harga',
    ];

    public function toko()
    {
        return $this->hasMany(Toko::class);  // Relasi ke Toko
    }
    public function baranggudang()
    {
        return $this->hasMany(BarangGudang::class);  // Relasi ke Toko
    }
}
