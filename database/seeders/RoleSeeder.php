<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'admin']);
        $rol2 = Role::create(['name' => 'gestor']);
        $rol3 = Role::create(['name' => 'jugador']);
        $rol4 = Role::create(['name' => 'fisioterapeuta']);
        $rol5 = Role::create(['name' => 'entrenador']);

        $rol1->givePermissionTo(Permission::all());

        $rol2->givePermissionTo(['activar pista','desactivar pista']);
    }
}
