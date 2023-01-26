<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JugadorParejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jugador_pareja')->insert([
            'jugador_id'=>1,
            'pareja_id'=>1
        ]);

        DB::table('jugador_pareja')->insert([
            'jugador_id'=>2,
            'pareja_id'=>1
        ]);

        DB::table('jugador_pareja')->insert([
            'jugador_id'=>1,
            'pareja_id'=>2
        ]);
        DB::table('jugador_pareja')->insert([
            'jugador_id'=>3,
            'pareja_id'=>2
        ]);

    }
}
