<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaccion>
 */
class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->sentence(10),
            'hora_entrada' => $this->faker->time(),
            'horaSalida' => $this->faker->time(),
            'id_tarifa' => $this->faker->randomElement([1,2,4]),//Me va a tomar un id de tarifa aliatorio en este caso solo tengo 3, que es el id 1 y el id 2 y el id 4
            'id_user' => $this->faker->randomElement([1,2]), //me va a tomar un id de ususario aliatorio en este caso solo tengo 2 que es el id 1 y el id 2
            'estado' => $this->faker->sentence(20)
        ];
    }
}
