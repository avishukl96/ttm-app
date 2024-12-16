<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
    }
}
