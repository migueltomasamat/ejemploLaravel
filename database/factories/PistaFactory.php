<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pista>
 */
class PistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //Solamente almacenamos el precio de la luz si la pista tiene disponible la luz
        $luz=fake()->boolean();
        $precioLuz=fake()->randomFloat(2,2,20.75);
        if(!$luz){
            $precioLuz=null;
        }
        //Generamos los valores aleatorios
        return [
            'luz'=>$luz,
            'cubierta'=>fake()->boolean(),
            'disponible'=>fake()->boolean(),
            'tipoPista'=>fake()->randomElement(['Individual','Dobles']),
            'precioLuz'=>$precioLuz
        ];
    }
}
