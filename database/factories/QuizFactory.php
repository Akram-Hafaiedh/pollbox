<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
            'description' => fake()->sentence(20),
            'active' => (bool) rand(0, 1),
            // 'time_limit' => rand(15, 60),
            'start_date' => fake()->date('Y-m-d'),
            'end_date' => fake()->date('Y-m-d'),
            'score' => rand(0, 100),
            'has_correct_answers' => (bool) rand(0, 1),
            'color' =>fake()->hexColor(),
            'language' => fake()->languageCode(),
            'category_id' => Category::factory(),
            'user_id' => User::where('role', 'admin')->first()->id,
            'visibility' => fake()->randomElement(['public', 'private', 'restricted']),  // Override default visibility if needed
            // 'randomize' => true,        // Override default randomize value if needed
        ];
    }
}
