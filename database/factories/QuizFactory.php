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

        $languages = ['fr', 'ar', 'en'];
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(20),
            'start_date' => $startDate = fake()->date('Y-m-d'),
            'end_date' => fake()->dateTimeBetween($startDate, '+1 year')->format('Y-m-d'),
            'bg_color' => fake()->hexColor(),
            'text_color' => fake()->hexColor(),
            'language' => fake()->randomElement($languages),
            'category_id' => Category::factory(),
            'user_id' => User::where('role', 'admin')->first()->id,
            'visibility' => fake()->randomElement(['public', 'private', 'restricted']),

        ];
    }
}
