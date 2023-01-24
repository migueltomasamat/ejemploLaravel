<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'cubierta'=>1,
            'disponible'=>1,
            'precioLuz'=>2.5,
            'tipoPista'=>'Individual'
        ]);
    }
}
