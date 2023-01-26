<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        DB::table('users')->insert([
            'nombre'=>'Ana',
            'apellidos'=>'Martínez',
            'telefono'=>'655955767',
            'email'=>'ana@mail.com',
            'password'=>Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'nombre'=>'Silvia',
            'apellidos'=>'Hernández',
            'telefono'=>'655955767',
            'email'=>'silvia@mail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
