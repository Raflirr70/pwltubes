<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


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

        for($i=1; $i<=5;$i++){
            $faker = Faker::create();
            User::create([
                'username' => 'Manager'.$i,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'id_toko' => $i,
                'id_role' => 2,
                'email' => 'manager'.$i.'@gmail.com',
                'password' => Hash::make('password')
            ]);
            User::create([
                'username' => 'Supervisor'.$i,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'id_toko' => $i,
                'id_role' => 3,
                'email' => 'supervisor'.$i.'@gmail.com',
                'password' => Hash::make('password')
            ]);
            User::create([
                'username' => 'kasir'.$i,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'id_toko' => $i,
                'id_role' => 4,
                'email' => 'kasir'.$i.'@gmail.com',
                'password' => Hash::make('password')
            ]);
            User::create([
                'username' => 'gudang'.$i,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'id_toko' => $i,
                'id_role' => 5,
                'email' => 'gudang'.$i.'@gmail.com',
                'password' =>  Hash::make('password'),
            ]);

            //pembeli
            User::create([
                'username' => 'pembeli'.$i,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'id_toko' => $i,
                'id_role' => 6,
                'email' => 'pembeli'.$i.'@gmail.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
