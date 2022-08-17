<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artical>
 */
class ArticalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(20, true),
            'artical' => $this->faker->words(350, true),
            'image' => $this->faker->imageUrl(),
            'views' => $this->faker->numberBetween(1, 1000),
            'user_id' => $this->faker->numberBetween(1, 15),
            'catartical_id' => $this->faker->numberBetween(1, 8)
        ];
    }
}
