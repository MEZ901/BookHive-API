<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'show books']);
        Permission::create(['name' => 'add books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'delete books']);

        Permission::create(['name' => 'show genres']);
        Permission::create(['name' => 'add genres']);
        Permission::create(['name' => 'edit genres']);
        Permission::create(['name' => 'delete genres']);
        
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'edit users']);
    }
}
