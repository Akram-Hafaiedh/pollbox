<x-app-layout>
    <div class="container mx-auto my-8">
        <h1 class="mb-4 text-3xl font-semibold">{{ $quiz->title }}</h1>

        @if ($quiz->questions->count() > 0)
        <ol class="pl-4 list-decimal">
            @foreach ($quiz->questions as $question)
            <li class="mb-4">
                <p class="font-semibold">{{ $question->text }}</p>
                @if ($question->options->count() > 0)
                <ul class="pl-4 list-disc">
                    @foreach ($question->options as $option)
                    <li>{{ $option->text }}</li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ol>
        @else
        <p class="text-gray-500">No questions found for this quiz.</p>
        @endif
    </div>
</x-app-layout>

