<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identification' => $this->faker->numberBetween(10000, 2147483647),
            'name' => $this->faker->name,
            'phone' => $this->faker->numberBetween(1165654, 2147483647),
            'address' => $this->faker->address,
            'email' => $this->faker->email,
        ];
    }
}
