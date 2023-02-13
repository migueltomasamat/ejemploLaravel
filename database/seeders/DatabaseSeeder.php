<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jugador;
use App\Models\Pista;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Jugador::factory()->count(10)->create();
        Pista::factory()->count(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            //JugadorSeeder::class,
            ParejaSeeder::class,
            JugadorParejaSeeder::class,
            //PistaSeeder::class,
            IntervaloSeeder::class,
            PartidaSeeder::class,
            ParejaPartidaSeeder::class
        ]);
    }
}
