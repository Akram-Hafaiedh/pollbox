<x-app-layout>
    <div class="container mx-auto my-8" x-data="{open : false}">
        <h1 class="mb-4 text-3xl font-semibold">Quiz Summary</h1>
        <h1 class="mb-4 text-xl font-semibold">Title : {{ $quiz->title }} </h1>
        <span class="">Created At : {{ $quiz->created_at }}</span>

        @if(session('success'))
        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="success">
            <strong class="font-bold">Success</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if ($quiz->questions->count() > 0)
        <ol class="grid grid-cols-1 gap-2 pl-4 list-decimal md:grid-cols-2">
            @foreach ($quiz->questions as $question)
            <li class="my-4">
                    <p class="font-semibold" x-on:click="open = ! open">{{ $question->content }} </p>

                @switch($question->type)

                    @case('single_choice')
                        @include('user.quizzes.partials.single_option', ['question' => $question, 'userResponses' => $userResponses])
                    @break
                    @case('multiple_choice')
                        @include('user.quizzes.partials.multiple_options', ['question' => $question, 'userResponses' => $userResponses])
                    @break
                    @case('feedback')
                        @include('user.quizzes.partials.feedback', ['question' => $question, 'userResponses' => $userResponses])
                    @break
                    @case('likert_scale')
                        @include('user.quizzes.partials.likert_scale', ['question' => $question, 'userResponses' => $userResponses])
                    @break
                    @case('ranking')
                        @include('user.quizzes.partials.ranking', ['question' => $question, 'userResponses' => $userResponses])
                    @break
                    @default
                        <p>Question type not supported.</p>
                @endswitch
            </li>
            @endforeach
        </ol>
        @else
        <p class="text-gray-500">No questions found for this quiz.</p>
        @endif
    </div>
</x-app-layout>

