<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toko::create([
            'name' => 'Cipanas',
            'pendapatan' => 0,
        ]);
        Toko::create([
            'name' => 'Cianjur',
            'pendapatan' => 0,
        ]);
        Toko::create([
            'name' => 'Bandung',
            'pendapatan' => 0,
        ]);
        Toko::create([
            'name' => 'Jakarta',
            'pendapatan' => 0,
        ]);
        Toko::create([
            'name' => 'Bali',
            'pendapatan' => 0,
        ]);
    }
}
