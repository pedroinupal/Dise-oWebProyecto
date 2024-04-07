<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'name'          => $name,
            'username'         => $this->faker->numerify(str_replace(' ', '_',strtolower($name.'-####'))),
            'password'   => $this->faker->password(),
            'rfc' => $this->faker->bothify('???#######??'),
            'active' => $this->faker->boolean()
        ];
    }
}
