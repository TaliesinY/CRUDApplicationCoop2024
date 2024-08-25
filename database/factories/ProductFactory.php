<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1,1000),
            'provider' => $this->faker->company(),
            'url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph()
        ];
    }
}
