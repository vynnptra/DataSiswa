<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-hobby']);
        Permission::create(['name' => 'read-hobby']);
        Permission::create(['name' => 'update-hobby']);
        Permission::create(['name' => 'delete-hobby']);
        Permission::create(['name' => 'create-siswa']);
        Permission::create(['name' => 'read-siswa']);
        Permission::create(['name' => 'update-siswa']);
        Permission::create(['name' => 'delete-siswa']);

        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $superadmin->givePermissionTo([
            'create-hobby',
            'read-hobby',
            'update-hobby',
            'delete-hobby',
            'create-siswa',
            'read-siswa',
            'update-siswa',
            'delete-siswa',
        ]);
        $admin->givePermissionTo([
            'create-hobby',
            'read-hobby',
            'update-hobby',
            'delete-hobby',
            ]);
        $user->givePermissionTo([
            'read-hobby',
            'read-siswa',
        ]);
    }
}
