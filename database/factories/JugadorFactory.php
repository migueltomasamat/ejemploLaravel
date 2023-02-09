<?php

namespace Database\Factories;

use App\Models\Jugador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{

    protected $model = Jugador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nivelJuego'=>fake()->numberBetween(1,5),
            'manoHabil'=>fake()->randomElement(['Izquierda','Derecha']),
            'ladoPreferido'=>fake()->randomElement(['Derecho','Izquierdo']),
            'indiceResponsabilidad'=>fake()->numberBetween(0, 100),
            'numFederado'=>fake()->randomNumber(5),
            'renovacionAutomatica'=>fake()->boolean(),
            'partidasMixtas'=>fake()->boolean(),
        ];
    }
}
