<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Role;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->randomNumber(),
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->name(),
            'sexo' => "masculino",
            'fecha_nacimiento' =>date('Y-m-d H:i:s'),
            'domicilio' => "Holdich 42",
            'estado_civil' => "soltero",
            'empresa' => "SSA",
            'cuil' => $this->faker->randomNumber(),
            'telefono' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'plan' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => ROLE::ADMINISTRADOR
            
        ];
    }

    public function planRandom(){
        if($this->faker->numberBetween(0,3)==1)
            return 'Plan A';
        if($this->faker->numberBetween(0,3)==2)
            return 'Plan B';
        if($this->faker->numberBetween(0,3)==3)
            return 'Plan C';
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
