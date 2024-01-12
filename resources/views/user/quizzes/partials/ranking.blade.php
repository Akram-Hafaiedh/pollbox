{{-- resources\views\user\quizzes\partials\ranking.blade.php --}}
@if ($question->type === 'ranking')
    <div class="mt-4">
        @php
            // Create an array mapping option IDs to their ranks
            $optionIdToRanking = $userResponses->where('question_id', $question->id)
                                               ->pluck('rank', 'response_id');

            // Sort the question options based on the user's ranks
            $sortedOptions = $question->options->sort(function ($option) use ($optionIdToRanking) {
                // Find the rank of the option ID, return a large number if not found to push to the end
                return $optionIdToRanking[$option->id] ?? PHP_INT_MAX;
            });
        @endphp
        <ol class="space-y-2 list-decimal list-inside">
            @foreach ($sortedOptions as $option)
                <li class="p-3 rounded-full shadow bg-secondary/70">
                    {{ $option->content }}
                </li>
            @endforeach
        </ol>
    </div>
@endif
