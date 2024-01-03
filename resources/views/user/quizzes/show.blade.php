<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __($quiz->title) }}
        </h2>
    </x-slot>
    {{-- @if(session('error'))
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif --}}
    {{-- @if ($errors->any())
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Validation errors:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    @if ($errors->any())
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Validation errors:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->keys() as $errorKey)
                {{-- Extract the question identifier from the error key --}}
                @php
                    preg_match('/responses\.(\d+)/', $errorKey, $matches);
                    $questionIdentifier = $matches[1] ?? null;
                @endphp

                {{-- Determine the question number based on its order in the quiz --}}
                @if ($questionIdentifier)
                    @php
                        // Find the question in the collection and get its index
                        $questionIndex = $quiz->questions->pluck('id')->search($questionIdentifier);
                        // Adding 1 to convert from zero-index to human-readable question number
                        $questionNumber = $questionIndex !== false ? $questionIndex + 1 : '?';
                    @endphp
                    <li>Question number {{ $questionNumber }} response is required.</li>
                @else
                    {{-- If question number is not found, display the original error message --}}
                    <li>{{ $errors->first($errorKey) }}</li>
                @endif
            @endforeach
        </ul>
    </div>
    @endif
    <div class="flex items-center justify-center bg-gray-100">
        <div class="w-full" x-data="{ currentSlide: 0, totalSlides: {{ count($quiz->questions) }} }">
            @if ($quiz->questions->count() > 0)
            <form action="{{ route('user.quizzes.submit', $quiz) }}" method="post">
                @csrf
                <div class="flex flex-col items-center justify-center w-full p-6 bg-gray-200 rounded-lg shadow">
                    <!-- Slider -->
                    <div class="flex items-center justify-around w-full my-4">
                        <template x-for="index in totalSlides">
                            <button @click.prevent="currentSlide = index - 1"
                                :class="{ 'bg-blue-500 text-white': currentSlide === index - 1, 'bg-gray-300': currentSlide !== index - 1 }"
                                class="flex items-center justify-center w-10 h-10 mx-1 rounded-full focus:outline-none">
                                <span class="" x-text="index"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Question Container -->
                    <div class="flex-grow w-full px-8">
                        @foreach ($quiz->questions as $key => $question)
                        <div x-show="currentSlide === {{ $loop->index }}" class="transition-opacity duration-500"
                            x-cloak>
                            <h2 class="mx-auto mt-4 mb-4 text-2xl font-semibold w-fit">{{ $key + 1 }} - {{
                                $question->content }}
                                <span class="text-red-500">{{
                                    $question->required ? '*' : '' }}</span>
                            </h2>

                            {{--! Hidden Input --}}
                            <input type="hidden" name="questions[{{ $question->id }}]" value='{"type":"{{ $question->type }}", "required":{{ $question->required ? "true" : "false" }}}'>

                            @if ($question->image_path)
                            <img class="h-auto max-w-md mx-auto mb-8"
                                src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image"
                                class="w-32 h-auto">
                            @endif

                            @if ($question->video_url)

                            <div class="max-w-2xl mx-auto my-4 rounded-lg">
                                <div class="aspect-w-16 aspect-h-9">
                                    <iframe class="w-full h-full"
                                        src="https://www.youtube.com/embed/{{ getYoutubeVideoId($question->video_url) }}?controls=0&rel=0&fs=1"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            @endif


                            {{-- Options --}}
                            <div class="mx-auto space-y-2 w-fit">
                                {{-- Check if the question type is 'feedback' --}}
                                @if ($question->type === 'feedback')
                                <p class="text-sm text-gray-500">Enter your answer here.</p>
                                <textarea name="responses[{{ $question->id }}]" id="feedback" rows="6" cols="70"
                                    class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                                @endif

                                @if ($question->type === 'multiple_choice')
                                <p class="text-sm text-gray-500">Choose one or more options.</p>
                                @endif

                                @if($question->type ==='numeric')

                                <p class="text-sm text-gray-500">Enter a number between 1 and 10.</p>
                                @endif

                                @if($question->type ==='ranking')
                                <p class="text-sm text-gray-500">Rank your preference from 1 (lowest) to {{
                                    count($question->options) }} (highest).
                                </p>
                                @endif

                                @if ($question->type === 'single_choice')
                                <p class="text-sm text-gray-500">Choose one option.</p>
                                @endif

                                @foreach ($question->options as $option)
                                @switch($question->type)

                                @case('multiple_choice')
                                <span class="sr-only">Multiple Choices</span>
                                <div class="flex items-center py-2 space-x-4">
                                    <input type="checkbox" name="responses[{{ $question->id }}][{{ $option->id }}]"
                                        id="{{ $option->id }}" value="true"
                                        class="w-6 h-6 p-2 text-blue-500 border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                                    <label for="{{ $option->id }}" class="font-bold text-gray-700">
                                        <div
                                            class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black ">
                                            {{ $option->content }}
                                        </div>
                                    </label>
                                </div>
                                @break

                                @case('single_choice')
                                <span class="sr-only">Single Choice</span>
                                <label class="flex items-center justify-start space-x-2 space-y-2">
                                    <input class="w-6 h-6" type="radio" name="responses[{{ $question->id }}]"
                                        value="{{ $option->id }}">
                                    {{-- name="option_group_{{ $loop->parent->index }}" value="{{ $option }}" --}}
                                    <span
                                        class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black">{{
                                        $option->content }}</span>
                                </label>
                                @break

                                @case('ranking')
                                <div class="flex items-center justify-between py-2 space-x-4">
                                    <div for="ranking_response" class="font-bold text-gray-700">
                                        <div
                                            class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black">
                                            {{ $option->content }}
                                        </div>
                                    </div>
                                    <input type="number" name="responses[{{ $question->id }}][{{ $option->id }}]"
                                        class="w-12 p-2 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                @break

                                @case('numeric')
                                <div class="flex items-center justify-between py-2 space-x-4">

                                    <div class="font-bold text-gray-700">
                                        <div
                                            class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black">
                                            {{ $option->content }}
                                        </div>
                                    </div>
                                    <input type="number" name="responses[{{ $question->id }}][{{ $option->id }}]" min="1"
                                        class="w-12 p-2 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                @break

                                @endswitch

                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-end w-full px-8 mt-4 space-x-4">
                        <button type="button"
                            @click.prevent="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                            :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === 0 }"
                            class="px-4 py-2 text-white bg-indigo-700 rounded focus:outline-none disabled:opacity-50"
                            :disabled="currentSlide === 0">Previous</button>
                        <button type="button" @click.prevent="currentSlide = (currentSlide + 1) % totalSlides"
                            :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === totalSlides - 1 }"
                            class="px-4 py-2 text-white bg-indigo-700 rounded focus:outline-none disabled:opacity-50"
                            :disabled="currentSlide === totalSlides - 1">Next</button>
                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 text-white rounded focus:outline-none" :class="{ 'bg-red-500': currentSlide !== totalSlides - 1,
                                'bg-green-500': currentSlide === totalSlides - 1 }">
                            <span x-text="currentSlide !== totalSlides - 1 ? 'Leave' : 'Submit Quiz'"></span>
                        </button>
                    </div>
                </div>
            </form>
            @else
            <p class="text-gray-500">No questions found for this quiz.</p>
            @endif
        </div>
    </div>
</x-app-layout>
