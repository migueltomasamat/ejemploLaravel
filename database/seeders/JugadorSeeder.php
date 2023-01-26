<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jugadors')->insert([
            'nivelJuego'=>5,
            'manoHabil'=>'Izquierda',
            'ladoPreferido'=>'Derecho',
            'indiceResponsabilidad'=>100,
            'numFederado'=>12345,
            'renovacionAutomatica'=>1,
            'partidasMixtas'=>1,
            'user_id'=>1,
        ]);

        DB::table('jugadors')->insert([
            'nivelJuego'=>1,
            'manoHabil'=>'Derecha',
            'ladoPreferido'=>'Indiferente',
            'indiceResponsabilidad'=>100,
            'numFederado'=>54321,
            'renovacionAutomatica'=>1,
            'partidasMixtas'=>1,
            'user_id'=>2,
        ]);

        DB::table('jugadors')->insert([
            'nivelJuego'=>2,
            'manoHabil'=>'Izquierda',
            'ladoPreferido'=>'Indiferente',
            'indiceResponsabilidad'=>90,
            'numFederado'=>54321,
            'renovacionAutomatica'=>1,
            'partidasMixtas'=>1,
            'user_id'=>3,
        ]);
    }
}
