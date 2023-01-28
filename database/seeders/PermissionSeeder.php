<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'crear pista']);
        Permission::create(['name' => 'editar pista']);
        Permission::create(['name' => 'borrar pista']);
        Permission::create(['name' => 'desactivar pista']);
        Permission::create(['name' => 'activar pista']);
    }
}
