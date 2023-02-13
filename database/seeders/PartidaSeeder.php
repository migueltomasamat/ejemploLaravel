<?php

namespace Database\Seeders;

use App\Models\Partida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partida::create([
            'intervalo_id'=>1
        ]);
        Partida::create([
            'intervalo_id'=>2
        ]);
        Partida::create([
            'intervalo_id'=>3
        ]);
    }
}
