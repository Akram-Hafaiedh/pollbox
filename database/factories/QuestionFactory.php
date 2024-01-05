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

        $video_ids = [
            'UbEpM-VwOU8',
            'tlUcmD0zPI4',
            'BYl7v0YsX9g',
            // Add more video IDs
        ];
        $random_video_id = $video_ids[array_rand($video_ids)];


        return [
            'content' => fake()->sentence(),
            'type' => fake()->randomElement([
                'multiple_choice',
                'single_choice',
                'feedback',
                'ranking',
                'numeric',
                'dropdown',
                'likert_scale',
                'slider',
                'date',
                'file_upload',
                'text'
            ]),
            // 'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'required' => fake()->boolean(),
            'image_path' => 'https://via.placeholder.com/300', //! Placeholder image URL
            'video_url' => 'https://www.youtube.com/embed/' . $random_video_id, //! Random video embed URL
        ];
    }
}
