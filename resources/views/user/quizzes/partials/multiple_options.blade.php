@if ($question->options->count() > 0)

    <ul class="pl-4 mt-4 space-y-2">
        @foreach ($question->options as $option)
            @php
                $isSelected = $userResponses->where('question_id', $question->id)->where('option_id', $option->id)->isNotEmpty();
                $class = $isSelected ? 'bg-primary text-white' : 'bg-primary/25';
            @endphp
            <li class="{{ $class }} px-4 py-2 rounded-full w-fit">{{ $option->content }}</li>
        @endforeach
    </ul>
@endif
