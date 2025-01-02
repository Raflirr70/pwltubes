<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gudang::create([
            'id_toko' => 1,
            'jumlah_barang' => 1000,
            'total_harga' => 10000,
        ]);

        Gudang::create([
            'id_toko' => 2,
            'jumlah_barang' => 1000,
            'total_harga' => 10000,
        ]);

        Gudang::create([
            'id_toko' => 3,
            'jumlah_barang' => 1000,
            'total_harga' => 10000,
        ]);
    }
}
