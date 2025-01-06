<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'id_gudang',
        'jumlah_barang',
        'total_harga',
    ];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'id');
    }

}
