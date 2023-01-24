<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parejas')->insert([
           'nombre'=>'Montxis'
        ]);

        DB::table('parejas')->insert([
            'nombre'=>'Patxis'
        ]);

    }
}
