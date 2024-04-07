<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = $this->faker->firstName();
        $lastname =  $this->faker->lastName();
        $name = $firstname.' '.$lastname;
        return [
            'role_id'  => $this->faker->numberBetween(1, 4),
            'name'          => $name,
            'username'         => $this->faker->numerify(str_replace(' ', '_',strtolower($name.'-####'))),
            'password'   => $this->faker->password(),
            'active' => $this->faker->boolean()
        ];
    }
}
