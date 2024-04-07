<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $boolimg = $this->faker->optional(0.7)->imageUrl(640, 480, 'Loaded Unit Photo', true);
        $pathPhoto2 = $boolimg ? $this->faker->optional(0.7)->imageUrl(640, 480, 'Delivery proof', true) : null;

    return [
        'customer_id' => $this->faker->numberBetween(1, 30),
        'status_id' => $this->faker->numberBetween(1, 4),
        'product_id' => $this->faker->numberBetween(1, 30),
        'address' => $this->faker->address(),
        'order_date' => $this->faker->dateTime(),
        'ordered_quantity'=> $this->faker->numberBetween(1, 20),
        'PathPhoto1' => $boolimg,
        'PathPhoto2' => $pathPhoto2,
        'active' => $this->faker->boolean()
    ];
    }
}
