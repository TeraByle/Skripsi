<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $usersData = [
            [
                'name' => 'Zhofar Putra',
                'username' => 'jopar',
                'email' => 'superadmin@yes.com',
                'password' => Hash::make('masbro'),
            ],
            [
                'name' => 'Ilham Huda',
                'username' => 'hudai',
                'email' => 'admin1@yes.com',
                'password' => Hash::make('masako'),
            ],
            [
                'name' => 'Leonardo',
                'username' => 'leomord',
                'email' => 'superadmin2@yes.com',
                'password' => Hash::make('masalah'),
            ],
        ];

        foreach ($usersData as $userData) {
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
