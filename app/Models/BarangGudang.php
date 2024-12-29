<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangGudang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'id_gudang',
        'jumlah_barang'
    ];

    public function gudang()
    {
        return $this->hasMany(Gudang::class);  // Relasi ke Toko
    }

}
