<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'harga_barang'
    ];

    public function baranggudangs()
    {
        return $this->hasMany(BarangGudang::class);
    }
}
