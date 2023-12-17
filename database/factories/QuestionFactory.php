<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->sentence(),
            'type' => fake()->randomElement(['multiple_choice', 'single_choice', 'open_ended']),
            'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'required' => fake()->boolean(),
        ];
    }
}
