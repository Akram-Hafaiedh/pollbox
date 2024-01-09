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
                Question::factory($questionsNumber)->create(['quiz_id' => $quiz->id])->each(function ($question) {
                    if ($question->type === 'feedback') {
                        $optionsNumber = 1;
                    } elseif ($question->type === 'likert_scale') {
                        $optionsNumber = 10; // For likert_scale, always create 10 options
                    } else {
                        $optionsNumber = rand(4, 8);
                    }

                    // If the question is a likert_scale, create options with numbers 1 to 10
                    if ($question->type === 'likert_scale') {
                        $options = collect(range(1, 10))->map(function ($number) use ($question) {
                            return new Option(['question_id' => $question->id, 'content' => (string)$number]);
                        });
                        $question->options()->saveMany($options);
                    } else {
                        // For other types of questions, use the factory to create random options
                        $question->options()->saveMany(Option::factory($optionsNumber)->create(['question_id' => $question->id]));
                    }
                })
            );
        });
    }
}
