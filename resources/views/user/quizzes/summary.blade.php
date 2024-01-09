<x-app-layout>
    <div class="container mx-auto my-8">
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
                <p class="font-semibold">{{ $question->content }}</p>
                @if ($question->options->count() > 0)
                <ul class="pl-4 mt-4 space-y-2">



                    @foreach ($question->options as $option)
                    <li class="px-4 py-2 rounded-full w-fit
                            @if($userResponses->where('question_id', $question->id)->where('option_id', $option->id)->isNotEmpty())
                                bg-blue-500 text-white
                            @else
                                bg-gray-200
                            @endif
                        ">{{ $option->content }}</li>
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

