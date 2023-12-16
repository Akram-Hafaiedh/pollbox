<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->realText(100),
            'active' => (bool) rand(0, 1),
            'time_limit' => rand(15, 60),
            'score' => rand(0, 100),
            'has_correct_answers' => (bool) rand(0, 1),
        ];
    }
}
