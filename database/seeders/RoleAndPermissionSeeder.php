<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions if they don't exist
        Permission::firstOrCreate(['name' => 'create posts']);
        Permission::firstOrCreate(['name' => 'edit posts']);
        Permission::firstOrCreate(['name' => 'delete posts']);

        // Find or create the "Admin" role
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Assign permissions to the "Admin" role
        $adminRole->givePermissionTo([
            'create posts',
            'edit posts',
            'delete posts',
        ]);

        // You can add more roles and permissions here if needed
    }
}
