@if ($question->options->count() > 0)

@php
    // echo $userResponses->where('question_id', $question->id);
    $class = $userResponses->where('question_id', $question->id)->where('option_id', $question->options->first()->id)->isNotEmpty() ? 'bg-blue-500 text-white' : 'bg-gray-200';
@endphp

    <ul class="pl-4 mt-4 space-y-2">
        @foreach ($question->options as $option)
            @php
                $class = $userResponses->where('question_id', $question->id)->where('option_id', $option->id)->isNotEmpty() ? 'bg-blue-500 text-white' : 'bg-gray-200';
            @endphp
            <li class="{{ $class }} px-4 py-2 rounded-full w-fit">{{ $option->content }}</li>
        @endforeach
    </ul>
@endif
