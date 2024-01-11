{{-- resources\views\user\quizzes\partials\ranking.blade.php --}}
@if ($question->type === 'ranking')
    <div class="mt-4">

        @php
        echo $rankingResponses = $userResponses->where('question_id', $question->id);
            echo "<br><br>";
            echo $rankingResponses = $userResponses->where('question_id', $question->id)->sortBy('ranking');            $rankedOptionIDs = explode(',', $rankingResponse->content ?? '');
            $optionIdToRanking = $rankingResponses->pluck('ranking', 'option_id');
            // Sort the question options based on the ranking
            echo "<br><br>";
            echo $sortedOptions = $question->options->sortBy(function ($option) use ($optionIdToRanking) {
                return $optionIdToRanking[$option->id] ?? null;
            });
            // Retrieve the user's rankings for this question
            // Assume the response is a comma-separated list of option IDs in ranked order
            // Retrieve the options in the order they were ranked
        @endphp
        <ol class="mt-1 list-decimal list-inside">
            @foreach ($sortedOptions as $option)
                <li>{{ $option->id  }} - {{ $option->content }}</li>
            @endforeach
        </ol>
    </div>
@endif
