<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
    }
}