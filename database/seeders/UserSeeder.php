<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //pemilik
        User::create([
            'username' => 'pemilik',
            'firstname' => 'Rafli',
            'lastname' => 'Radiansyah',
            'id_toko' => 1,
            'id_role' => 1,
            'email' => 'pemilik@gmail.com',
            'password' =>  Hash::make('password'),
        ]);

        //Toko Cabang Cipanas
        User::create([
            'username' => 'Manager1',
            'firstname' => 'Uding',
            'lastname' => 'Smith',
            'id_toko' => 1,
            'id_role' => 2,
            'email' => 'manager1@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'Supervisor1',
            'firstname' => 'agus',
            'lastname' => 'rendang',
            'id_toko' => 1,
            'id_role' => 3,
            'email' => 'supervisor1@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'kasir1',
            'firstname' => 'jajang',
            'lastname' => 'petot',
            'id_toko' => 1,
            'id_role' => 4,
            'email' => 'kasir1@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'gudang1',
            'firstname' => 'iis',
            'lastname' => 'tiris',
            'id_toko' => 1,
            'id_role' => 5,
            'email' => 'gudang1@gmail.com',
            'password' =>  Hash::make('password'),
        ]);

        //Toko Cabang Cianjur
        User::create([
            'username' => 'Manager2',
            'firstname' => 'Jhon',
            'lastname' => 'Smith',
            'id_toko' => 2,
            'id_role' => 2,
            'email' => 'manager2@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'Supervisor2',
            'firstname' => 'alex',
            'lastname' => 'pablo',
            'id_toko' => 2,
            'id_role' => 3,
            'email' => 'supervisor2@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'kasir2',
            'firstname' => 'Wiliam',
            'lastname' => 'Tempoles',
            'id_toko' => 2,
            'id_role' => 4,
            'email' => 'kasir2@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'gudang2',
            'firstname' => 'Cat',
            'lastname' => 'Man',
            'id_toko' => 2,
            'id_role' => 5,
            'email' => 'gudang2gmail.com',
            'password' => Hash::make('password')
        ]);
        
        //Toko Cabang bandung
        User::create([
            'username' => 'Manager3',
            'firstname' => 'kaneki',
            'lastname' => 'ojora',
            'id_toko' => 3,
            'id_role' => 2,
            'email' => 'manager3@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'Supervisor3',
            'firstname' => 'Kirito',
            'lastname' => 'Byakugan',
            'id_toko' => 3,
            'id_role' => 3,
            'email' => 'supervisor3@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'kasir3',
            'firstname' => 'hinata',
            'lastname' => 'uzumaki',
            'id_toko' => 3,
            'id_role' => 4,
            'email' => 'kasir3@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'username' => 'gudang3',
            'firstname' => 'Hirata',
            'lastname' => 'Hyundai',
            'id_toko' => 3,
            'id_role' => 5,
            'email' => 'gudang3gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
