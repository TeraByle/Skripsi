<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole      = Role::create(['name' => 'Admin']);

        // Membuat permission untuk mengakses halaman produk, akun, dan transaksi
        $accessProductPermission = Permission::create(['name' => 'access product page']);
        $accessAccountPermission = Permission::create(['name' => 'access account page']);
        $accessTransactionPermission = Permission::create(['name' => 'access transaction page']);

        // Memberikan permission pada role 'Super Admin'
        $superAdminRole->givePermissionTo($accessProductPermission);
        $superAdminRole->givePermissionTo($accessAccountPermission);
        $superAdminRole->givePermissionTo($accessTransactionPermission);

        // Memberikan permission pada role 'Admin'
        $adminRole->givePermissionTo($accessProductPermission);
        $adminRole->givePermissionTo($accessTransactionPermission);


    }
}
