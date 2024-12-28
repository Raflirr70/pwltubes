<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pendapatan',
    ];

    public function users()
    {
        return $this->hasMany(User::class);  // Relasi ke User
    }
}

