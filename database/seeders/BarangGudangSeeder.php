<?php

namespace Database\Seeders;

use App\Models\BarangGudang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangGudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=5;$i++){
            for($ii=1;$ii<=10;$ii++){
                BarangGudang::create([
                    'id_gudang' => $i,
                    'id_barang' => $ii,
                    'jumlah_barang' => 100
                ]);
            }
        }
        
    }
}
