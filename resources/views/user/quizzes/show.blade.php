@php
    $dir = $quiz->language === 'ar' ? 'rtl' : 'ltr';
    $lang = $quiz->language;
@endphp

<x-app-layout :$dir :$lang>
    <x-slot name="header">
        <h2 class="w-full px-4 py-6 text-xl font-semibold leading-tight text-white"
            style="background-color: {{ $quiz->color }}">
            {{ __($quiz->title) }}
        </h2>
    </x-slot>
    {{-- @if (session('error'))
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
                                    :class="{
                                        'text-white': currentSlide === index - 1,
                                        'bg-gray-300': currentSlide !== index -
                                            1
                                    }"
                                    :style="currentSlide === index - 1 ? 'background-color: {{ $quiz->color }}' : ''"
                                    class="flex items-center justify-center w-10 h-10 mx-1 rounded-full focus:outline-none">
                                    <span class="" x-text="index"></span>
                                </button>
                            </template>
                        </div>

                        <!-- Question Container -->
                        <div class="flex-grow w-full px-8">
                            @foreach ($quiz->questions as $key => $question)
                                <div x-show="currentSlide === {{ $loop->index }}"
                                    class="transition-opacity duration-500" x-cloak>
                                    {{-- <p>{{ $question->type }}</p> --}}
                                    <h2 class="mx-auto mt-4 mb-4 text-2xl font-semibold w-fit">
                                        {{ $lang === 'ar' ? 'السؤال' : 'Question' }} {{ $key + 1 }} -
                                        {{ $question->content }}
                                        <span class="text-red-500">{{ $question->required ? '*' : '' }}</span>
                                    </h2>




                                    <div class='flex flex-row items-center justify-center space-x-2'>
                                        @if ($question->image_path)
                                            <img class="h-auto max-w-full" src="{{ asset($question->image_path) }}"
                                                alt="Question Image">
                                        @endif

                                        @if ($question->video_url)
                                            <div class="w-full max-w-xl aspect-video">
                                                <iframe class="w-full h-full" src="{{ $question->video_url }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>
                                        @endif
                                    </div>


                                    {{-- Options --}}
                                    <div class="max-w-xl mx-auto mt-6">
                                        {{-- Check if the question type is 'feedback' --}}
                                        @if ($question->type === 'feedback')
                                            <!-- Hidden input to store the question's ID -->
                                            <input type="hidden" name="questions[{{ $key }}][id]"
                                                value="{{ $question->id }}">

                                            <!-- Hidden input to store the question type -->
                                            <input type="hidden" name="questions[{{ $key }}][type]"
                                                value="feedback">

                                            <!-- hidden input for question Required -->
                                            <input type="hidden" name="questions[{{ $key }}][required]"
                                                value="{{ $question->required }}">

                                            <p class="text-sm text-gray-500">
                                                <!-- Display the prompt in Arabic if $lang is set to 'ar', otherwise in English -->
                                                {{ $lang === 'ar' ? 'أدخل إجابتك هنا ' : 'Enter your answer here' }}
                                                .
                                            </p>
                                            <textarea name="questions[{{ $key }}][answer]" id="feedback-{{ $question->id }}" rows="6"
                                                cols="70" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                            </textarea>
                                        @endif


                                        @if ($question->type === 'multiple_choice')
                                            <!-- Hidden input to store the question's ID -->
                                            <input type="hidden" name="questions[{{ $key }}][id]"
                                                value="{{ $question->id }}">

                                            <!-- Hidden input to store the question type -->
                                            <input type="hidden" name="questions[{{ $key }}][type]"
                                                value="multiple_choice">

                                            <!-- hidden input for question Required -->
                                            <input type="hidden" name="questions[{{ $key }}][required]"
                                                value="{{ $question->required }}">

                                            <p class="text-sm text-gray-500">
                                                {{ $lang === 'ar' ? 'اختر خيارًا أو أكثر لخانة الاختيار متعددة الاختيارات' : 'Choose one or more options' }}.
                                            </p>
                                            @foreach ($question->options as $option)
                                                <div class="flex items-center py-2 space-x-4">
                                                    <input type="checkbox"
                                                        name="questions[{{ $key }}][selected_options][]"
                                                        id="{{ $option->id }}" value="{{ $option->id }}"
                                                        class="w-6 h-6 p-2 text-blue-500 border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                                                    <label for="{{ $option->id }}" class="font-bold text-gray-700">
                                                        <div
                                                            class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black">
                                                            {{ $option->content }}
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif


                                        @if ($question->type == 'ranking')
                                            <p class="mb-4 text-sm text-gray-500">
                                                Rank your preference from 1 (lowest) to {{ count($question->options) }}
                                                (highest)
                                                .
                                            </p>
                                            <!-- Hidden input to store the question's ID -->
                                            <input type="hidden" name="questions[{{ $key }}][id]"
                                                value="{{ $question->id }}">

                                            <!-- Hidden input to store the question type -->
                                            <input type="hidden" name="questions[{{ $key }}][type]"
                                                value="ranking">
                                            <!-- hidden input for question Required -->
                                            <input type="hidden" name="questions[{{ $key }}][required]"
                                                value="{{ $question->required }}">

                                            <div class="px-2" x-data="{ list: {{ Js::from($question->options) }}, dragIndex: null }" x-init="() => {
                                                let sortable = new Sortable($el, {
                                                    animation: 150,
                                                    ghostClass: 'bg-gray-300', // This class will be applied to the ghost element
                                                    onEnd: (evt) => {
                                                        let order = sortable.toArray();
                                                        document.querySelectorAll('.ranking-input').forEach((input, index) => {
                                                            input.value = order[index];
                                                        });
                                                    }
                                                });
                                            }">
                                                <template x-for="(item, index) in list" :key="item.id">
                                                    <div class="flex items-center p-3 mb-2 bg-white border border-gray-200 rounded shadow cursor-move"
                                                        x-text="item.content" x-on:mousedown="dragIndex = index"
                                                        x-on:touchstart="dragIndex = index"
                                                        x-on:mouseup="dragIndex = null" x-on:touchend="dragIndex = null"
                                                        :class="{ 'bg-indigo-200': dragIndex === index }">
                                                        <!-- Hidden input to store the ranking order -->
                                                        <input type="hidden" :name="'responses[' + item.id + ']'"
                                                            :value="item.id" class="ranking-input">
                                                    </div>
                                                </template>
                                            </div>
                                        @endif


                                        @if ($question->type === 'likert_scale')
                                            <div class="my-4">
                                                <!-- Hidden input to store the question's ID -->
                                                <input type="hidden" name="questions[{{ $key }}][id]"
                                                    value="{{ $question->id }}">

                                                <!-- Hidden input to store the question type -->
                                                <input type="hidden" name="questions[{{ $key }}][type]"
                                                    value="likert_scale">
                                                <!-- hidden input for question Required -->
                                                <input type="hidden" name="questions[{{ $key }}][required]"
                                                    value="{{ $question->required }}">

                                                <label for="likert_scale"
                                                    class="block text-sm font-medium text-gray-700">{{ $question->content }}</label>
                                                <div class="mt-2">
                                                    @foreach ($question->options as $option)
                                                        <div class="flex flex-row items-center space-x-2">
                                                            <input id="likert_option_{{ $option->id }}"
                                                                name="questions[{{ $key }}][scale_value]"
                                                                type="radio" value="{{ $option->content }}"
                                                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                                            <label for="likert_option_{{ $option->id }}"
                                                                class="block text-sm text-gray-700">
                                                                {{ $option->content }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif


                                        @if ($question->type === 'single_choice')
                                            <p class="text-sm text-gray-500">
                                                {{ $lang === 'ar' ? 'اختر خيارًا لخانة الاختيار' : 'Choose one option' }}.
                                            </p>
                                            <!-- Hidden input for the question's ID -->
                                            <input type="hidden" name="questions[{{ $key }}][id]"
                                                value="{{ $question->id }}">
                                            <!-- Hidden input for the question's type -->
                                            <input type="hidden" name="questions[{{ $key }}][type]"
                                                value="{{ $question->type }}">
                                            <!-- hidden input for question Required -->
                                            <input type="hidden" name="questions[{{ $key }}][required]"
                                                value="{{ $question->required }}">

                                            @foreach ($question->options as $option)
                                                <label class="flex items-center justify-start space-x-2 space-y-2">
                                                    <input class="w-6 h-6" type="radio"
                                                        name="questions[{{ $key }}][selected_option]"
                                                        value="{{ $option->content }}">
                                                    <span
                                                        class="px-8 py-2 text-white bg-blue-500 border border-gray-300 rounded-tr-full rounded-bl-full hover:bg-blue-300 hover:text-black">{{ $option->content }}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-end w-full px-8 mt-4 space-x-4">
                            <button type="button"
                                @click.prevent="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                                :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === 0 }"
                                class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                                style="background-color: {{ $quiz->color }}"
                                :disabled="currentSlide === 0">Previous</button>
                            <button type="button" @click.prevent="currentSlide = (currentSlide + 1) % totalSlides"
                                :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === totalSlides - 1 }"
                                class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                                style="background-color: {{ $quiz->color }}"
                                :disabled="currentSlide === totalSlides - 1">Next</button>
                            <!-- Submit Button -->
                            <button type="submit" class="px-4 py-2 text-white rounded focus:outline-none"
                                :class="{
                                    'bg-red-500': currentSlide !== totalSlides - 1,
                                    'bg-green-500': currentSlide === totalSlides - 1
                                }">
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
