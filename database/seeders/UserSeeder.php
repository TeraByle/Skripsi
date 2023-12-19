<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
 
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Zhofar Putra',
                'username' => 'jopar',
                'email' => 'superadmin@yes.com',
                'role' => 'superAdmin',
                'password' => Hash::make('admin')
            ],
            [
                'name' => 'Ilham Huda',
                'username' => 'hudai',
                'email' => 'admin1@yes.com',
                'role' => 'admin',
                'password' => Hash::make('admin')
            ],
            [
                'name' => 'Leonardo',
                'username' => 'leomord',
                'email' => 'admin1@yes.com',
                'role' => 'superAdmin',
                'password' => Hash::make('masalah')
            ]
        ];

        foreach ($userData as $userData) {
            $user = User::create($userData);

            // Assign roles to users
            if ($userData['username'] == 'jopar') {
                $user->assignRole('Super Admin');
            } elseif ($userData['username'] == 'hudai') {
                $user->assignRole('Admin');
            } elseif ($userData['username'] == 'leomord') {
                $user->assignRole('Super Admin');
            }
        }
    }
}

