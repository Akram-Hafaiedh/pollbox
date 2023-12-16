<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::factory(30)->make()->each(function ($quiz) {
            // Associate the quiz with a random existing user
            $quiz->user_id = User::all()->random()->id;
            $quiz->save();
        });
    }
}
