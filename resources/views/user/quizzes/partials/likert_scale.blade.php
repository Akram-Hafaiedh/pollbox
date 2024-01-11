{{-- resources\views\user\quizzes\partials\likert_scale.blade.php --}}
@if ($question->type === 'likert_scale')
    <div class="mt-4">

        @php
            // Retrieve the user's response for this Likert scale question
            $likertResponse = $userResponses->where('question_id', $question->id)->first();
        @endphp
        <div class="mt-1">
            <ul class="grid grid-cols-10 gap-1">
                @foreach (range(1, 10) as $scaleValue)
                    @php
                        // Determine if this scale value was chosen
                        $isSelected = $likertResponse && (int)$likertResponse->likert_scale === $scaleValue;
                        $class = $isSelected ? 'text-white bg-blue-500' : 'text-gray-500 bg-gray-200';
                    @endphp
                    <li class="{{ $class }} px-2 py-1 text-center rounded-full">{{ $scaleValue }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
