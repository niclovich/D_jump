<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comercio>
 */
class ComercioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('rol','vendedor')->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'comercio_nom'=> $this->faker->name(),
            'image_url'=> $this->faker->imageUrl(640, 480, 'animals', true),
            'comercio_descripcion' => $this->faker->paragraph(),
            'comercio_horario'=> $this->faker->randomElement(['08:00-16:00','09:00-17:00','06:00-24:00']),
            'comercio_telefono'=>  $this->faker->phoneNumber(),
            'estado'=> $this->faker->randomElement(['Validando','Validado','Eliminado']),
            'longitud'=>  $this->faker->phoneNumber(),
            'latitud'=>  $this->faker->phoneNumber(),
        ];
    }
}
