<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre'=>'Miguel Ángel',
            'apellidos'=>'Tomás Amat',
            'telefono'=>'655955767',
            'email'=>'miguel@mail.com',
            'password'=>Hash::make('123456')
        ]);
        $user=User::find(1);
        $rol=Role::find(1);
        $user->assignRole($rol);
        $user->save();

        DB::table('users')->insert([
            'nombre'=>'Ana',
            'apellidos'=>'Martínez',
            'telefono'=>'655955767',
            'email'=>'ana@mail.com',
            'password'=>Hash::make('123456')
        ]);
        $user2= User::where('email','ana@mail.com')->firstOrFail();
        $rol2 = Role::where('name','gestor')->firstOrFail();
        $user2->assignRole($rol2);

        DB::table('users')->insert([
            'nombre'=>'Silvia',
            'apellidos'=>'Hernández',
            'telefono'=>'655955767',
            'email'=>'silvia@mail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
