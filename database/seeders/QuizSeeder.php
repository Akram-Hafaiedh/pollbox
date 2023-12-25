<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
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
        Quiz::factory(30)->create()->each(function ($quiz) {
            $questionsNumber = rand(5, 8);

            $quiz->questions()->saveMany(
                Question::factory($questionsNumber)->create(['quiz_id' => $quiz->id])->each(function ($question) use ($quiz) {
                    // Create 4 options for each question
                    // $question->quiz_id = $quiz->id;
                    // $question->save();
                    $question->options()->saveMany(Option::factory(4)->create(['question_id' => $question->id]));
                })
            );
        });
    }
}
