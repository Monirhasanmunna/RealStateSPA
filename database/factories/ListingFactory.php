<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => fake()->numberBetween(1,7),
            'baths' => fake()->numberBetween(1,7),
            'area' => fake()->numberBetween(300,400),

            'city'  => fake()->city(),
            'code'  => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_no' => fake()->numberBetween(10,200),
            'price'     => fake()->numberBetween(50000, 2000000)
        ];
    }
}
