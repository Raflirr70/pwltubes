<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'name' => 'Pemilik',
            'guard_name' => 'web',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Supervisor',
            'guard_name' => 'web',
        ]);
        Role::create([
            'id' => 4,
            'name' => 'Kasir',
            'guard_name' => 'web',
        ]);
        Role::create([
            'id' => 5,
            'name' => 'Gudang',
            'guard_name' => 'web',
        ]);
        
    }
}
