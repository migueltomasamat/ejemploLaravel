<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pistas')->insert([
           'luz'=>1,
           'cubierta'=>0,
           'disponible'=>1,
           'tipoPista'=>'Individual',
           'precioLuz'=>2.50
        ]);

        DB::table('pistas')->insert([
            'luz'=>0,
            'cubierta'=>0,
            'disponible'=>1,
            'tipoPista'=>'Individual',
            'precioLuz'=>0
        ]);
        DB::table('pistas')->insert([
            'luz'=>0,
            'cubierta'=>1,
            'disponible'=>1,
            'tipoPista'=>'Dobles',
            'precioLuz'=>0
        ]);
        DB::table('pistas')->insert([
            'luz'=>1,
            'cubierta'=>1,
            'disponible'=>0,
            'tipoPista'=>'Dobles',
            'precioLuz'=>7.50
        ]);
    }
}
