@if ($question->options->count() > 0)

@php
    // echo $userResponses->where('question_id', $question->id);
    $class = $userResponses->where('question_id', $question->id)->where('option_id', $question->options->first()->id)->isNotEmpty() ? 'bg-blue-500 text-white' : 'bg-gray-200';
@endphp

    <ul x-show="open" class="pl-4 mt-4 space-y-2 transition duration-200 ease-in-out origin-top transform " x-transition:enter="scale-y-0" x-transition:enter-start="scale-y-0" x-transition:enter-end="scale-y-100" x-transition:leave="scale-y-100" x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-0">
        @foreach ($question->options as $option)
            @php
                $class = $userResponses->where('question_id', $question->id)->where('option_id', $option->id)->isNotEmpty() ? 'bg-primary text-white' : 'bg-primary/25';
            @endphp
            <li class="{{ $class }} px-4 py-2 rounded-full w-fit">{{ $option->content }}</li>
        @endforeach
    </ul>
@endif
