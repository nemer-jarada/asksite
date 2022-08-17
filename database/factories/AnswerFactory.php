<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 100),
            'question_id' => $this->faker->numberBetween(1, 100)
        ];
    }
}
