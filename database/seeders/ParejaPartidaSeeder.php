<?php

namespace Database\Seeders;

use App\Models\Partida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pareja;

class ParejaPartidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pareja1=Pareja::find(1);
        $pareja2=Pareja::find(2);

        $partida=Partida::find(1);
        $partida->parejas()->attach($pareja1);
        $partida->parejas()->attach($pareja2);

        $partida->save();

    }
}
