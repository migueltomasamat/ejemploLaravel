<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervaloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intervalos')->insert([
            'fecha_hora_inicio'=>Carbon::create(2022,03,22,8,0,0),
            'fecha_hora_fin'=>Carbon::create(2022,03,22,9,0,0),
            'user_id'=>1,
            'pista_id'=>1
        ]);

        DB::table('intervalos')->insert([
            'fecha_hora_inicio'=>Carbon::create(2022,03,22,9,0,0),
            'fecha_hora_fin'=>Carbon::create(2022,03,22,10,0,0),
            'user_id'=>2,
            'pista_id'=>2
        ]);

        DB::table('intervalos')->insert([
            'fecha_hora_inicio'=>Carbon::create(2022,03,22,11,0,0),
            'fecha_hora_fin'=>Carbon::create(2022,03,22,12,0,0),
            'user_id'=>3,
            'pista_id'=>1
        ]);
    }
}
