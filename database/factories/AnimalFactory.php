<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * for generating fake data/ seeding!
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['dog', 'cat', 'rodent']),
            'size' => $this->faker->optional()->randomElement(['Small', 'Medium', 'Large']), // Only for dogs
            'age' => $this->faker->numberBetween(1, 15),
            'color' => $this->faker->safeColorName(),
            'description' => $this->faker->paragraph(),
            'garden_needed' => $this->faker->boolean(30), // 30% chance of needing a garden
            'picture' => $this->faker->optional()->randomElement(['dog1.jpg', 'cat1.jpg', 'rodent1.jpg']),
        ];
    }
}
