<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::create([
            'name' => 'Buku',
            'harga_barang' => 10.00,
        ]);
        Barang::create([
            'name' => 'Pencil',
            'harga_barang' => 5.00,
        ]);
        Barang::create([
            'name' => 'Pulpen',
            'harga_barang' => 6.00,
        ]);
        Barang::create([
            'name' => 'Tas',
            'harga_barang' => 100.00,
        ]);
        Barang::create([
            'name' => 'Topi',
            'harga_barang' => 34.00,
        ]);
        Barang::create([
            'name' => 'Sweeter',
            'harga_barang' => 250.00,
        ]);
        Barang::create([
            'name' => 'Kacamata',
            'harga_barang' => 200.00,
        ]);
        Barang::create([
            'name' => 'Tempat Pensil',
            'harga_barang' => 80.00,
        ]);
        Barang::create([
            'name' => 'Senter',
            'harga_barang' => 50.00,
        ]);
        Barang::create([
            'name' => 'Lampu Belajar',
            'harga_barang' => 265.00,
        ]);
    }
}
