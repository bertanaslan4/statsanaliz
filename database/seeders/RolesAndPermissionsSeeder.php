<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage games']);
        Permission::create(['name' => 'view premium content']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view premium content');

        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}