<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __($quiz->title) }}
        </h2>
    </x-slot>
    @if(session('error'))
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
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
                            <h2 class="mb-4 text-2xl font-semibold">{{ $key + 1 }} - {{ $question->content }}</h2>


                            @if ($question->image_path)
                            <img class="h-auto max-w-md mx-auto mb-8"
                                src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image"
                                class="w-32 h-auto">
                            @endif

                            @if ($question->video_url)
                            <div class="max-w-2xl mx-auto my-4 rounded-lg">
                                <iframe class="w-full h-96" src="{{ $question->video_url }}?controls=0&rel=0&fs=1"
                                    frameborder="0" scrolling="no" allowfullscreen
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            </div>
                            @endif
                            {{-- Options --}}
                            <div class="mx-auto space-y-2">
                                @foreach ($question->options as $option)
                                <label class="flex items-center justify-center space-x-2">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option->id }}"
                                        {{-- name="option_group_{{ $loop->parent->index }}" value="{{ $option }}" --}}>
                                    <span>{{ $option->content }}</span>
                                </label>
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
