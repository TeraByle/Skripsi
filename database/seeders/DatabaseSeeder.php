<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

            DB::table('users')->insert([
                [
                    'name' => 'Zhofar Putra',
                    'username' => 'jopar',
                    'email' =>  'superadmin@yes.com',
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
        ]);





    }
}
