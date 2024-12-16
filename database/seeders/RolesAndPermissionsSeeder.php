<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Check if the role already exists, if not, create it
        if (!Role::where('name', 'Admin')->exists()) {
            Role::create(['name' => 'Admin']);
        }

        // Similarly for other roles (Manager, Member)
        if (!Role::where('name', 'Manager')->exists()) {
            Role::create(['name' => 'Manager']);
        }

        if (!Role::where('name', 'Member')->exists()) {
            Role::create(['name' => 'Member']);
        }

        // Create default permissions if needed
        $adminRole = Role::findByName('Admin');
        $managerRole = Role::findByName('Manager');
        $memberRole = Role::findByName('Member');

        // Add permissions to roles (example)
        // $adminRole->givePermissionTo('some-permission');
        // $managerRole->givePermissionTo('some-other-permission');
        // $memberRole->givePermissionTo('another-permission');
    }
}
