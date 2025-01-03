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
        for($i=1; $i<=5; $i++){
            Gudang::create([
                'id_toko' => $i,
                'jumlah_barang' => 1000,
                'total_harga' => 100000,
            ]);
        }
    }
}
