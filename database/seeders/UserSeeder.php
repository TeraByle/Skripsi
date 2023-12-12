<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Zhofar Putra',
                'username' => 'jopar',
                'email' => 'superadmin@yes.com',
                'role' => 'superAdmin',
                'password'=>Hash::make('admin')
            ],
            [
                'name' => 'Ilham Huda',
                'username' => 'hudai',
                'email' => 'admin1@yes.com',
                'role' => 'admin',
                'password'=>Hash::make('admin')
            ],
            [
                'name' => 'Leonardo',
                'username' => 'leomord',
                'email' => 'admin1@yes.com',
                'role' => 'superAdmin',
                'password'=>Hash::make('masalah')
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
