<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// database/seeders/PermissionSeeder.php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // Create permissions
    $permissions = [
        'view dashboard',
        'manage users',
        'manage roles',
        'manage permissions',
        'manage settings'
    ];

    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }

    // Create roles and assign permissions
    $admin = Role::create(['name' => 'Super Admin']);
    $admin->givePermissionTo(Permission::all());

    $manager = Role::create(['name' => 'Manager']);
    $manager->givePermissionTo(['view dashboard', 'manage users']);

    $user = Role::create(['name' => 'User']);
    $user->givePermissionTo('view dashboard');
}
}
