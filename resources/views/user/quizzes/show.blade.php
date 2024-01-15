@php
    $dir = $quiz->language === 'ar' ? 'rtl' : 'ltr';
    $lang = $quiz->language;
@endphp

<x-app-layout :$dir :$lang>
    <x-slot name="header">
        <h2 class="w-full px-4 py-6 text-xl font-semibold leading-tight text-white"
            style="background-color: {{ $quiz->bg_color }}">
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
        <div class="w-full" x-data="{ currentSlide: 0, totalSlides: {{ count($quiz->questions) }}, lang:'{{ $lang }}' }">
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
                                    :style="currentSlide === index - 1 ? 'background-color: {{ $quiz->bg_color }}' : ''"
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
                                    <div class="container flex flex-col items-center justify-center mx-auto mt-6">
                                        {{-- Check if the question type is 'feedback' --}}
                                        @if ($question->type === 'feedback')
                                            <!-- Hidden input to store the question's ID -->
                                            <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][required]" value="{{ $question->required }}">

                                            <p class="mb-4 text-sm text-gray-500">
                                                <!-- Display the prompt in Arabic if $lang is set to 'ar', otherwise in English -->
                                                {{ $lang === 'ar' ? 'أدخل إجابتك هنا ' : 'Enter your answer here' }}
                                            </p>
                                            <textarea name="questions[{{ $question->id }}][answer]" id="feedback-{{ $question->id }}" rows="6" cols="100" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                                        @endif


                                        @if ($question->type === 'multiple_choice')
                                            <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][required]" value="{{ $question->required }}">

                                            <p class="text-sm text-gray-500">
                                                {{ $lang === 'ar' ?
                                                     'اختر خيارًا أو أكثر لخانة الاختيار متعددة الاختيارات'
                                                    : 'Choose one or more options'
                                                }}.
                                            </p>
                                            @foreach ($question->options as $option)
                                                <div class="flex items-center py-2 space-x-4">
                                                    <input type="checkbox"
                                                        name="questions[{{ $question->id }}][selected_options][]"
                                                        id="{{ $option->id }}" value="{{ $option->id }}"
                                                        class="w-6 h-6 p-2 border-gray-300 rounded text-primary focus:outline-none focus:ring focus:border-primary/25">
                                                    <label for="{{ $option->id }}" class="font-bold text-gray-700">
                                                        <div class="px-4 py-2 text-white border border-gray-300 rounded-full bg-primary hover:bg-primary/25 hover:text-black">{{ $option->content }} </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif


                                        @if ($question->type == 'ranking')
                                        <p class="text-sm text-gray-500 ">
                                            {{ $lang === 'ar' ?'أدرج خيارًا أو أكثر للترتيب متعددة الاختيارات': 'Drag and drop your options' }}
                                        </p>
                                            <p class="mb-4 text-sm text-gray-500">
                                                {{ $lang === 'ar' ? 'ترتيب خياراتك' : 'Rank your options from 1 (lowest) to ' . count($question->options) . ' (highest)' }}
                                            </p>
                                            <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][required]" value="{{ $question->required }}">

                                            <div class="px-2" x-data="{ list: {{ Js::from($question->options) }}.map((item, index) => ({ ...item, rank: index + 1 })), dragIndex: null }" x-init="() => {
                                                let sortable = new Sortable($el, {
                                                    animation: 150,
                                                    ghostClass: 'bg-gray-300',
                                                    onEnd: (evt) => {
                                                        // Update the ranking order based on the new positions after sorting
                                                        list.forEach((item, index) => {
                                                            item.rank = index + 1; // Rank should start from 1, not 0
                                                        });
                                                    }
                                                });
                                            }">
                                                <template x-for="(item, index) in list" :key="item.id">
                                                    <div class="flex items-center p-3 mb-2 bg-white border border-gray-200 rounded-full shadow cursor-move w-fit"
                                                        x-on:mousedown="dragIndex = index"
                                                        x-on:touchstart="dragIndex = index"
                                                        x-on:mouseup="dragIndex = null" x-on:touchend="dragIndex = null"
                                                        :class="{ 'bg-primary': dragIndex === index }">
                                                        <span  x-text="item.content"></span>
                                                        <!-- Hidden input to store the ranking order -->
                                                        <input type="hidden" :name="'questions[' + '{{ $question->id }}' + '][rankings][' + item.id + ']'" x-bind:value="item.rank" class="ranking-input">
                                                    </div>
                                                </template>
                                            </div>
                                        @endif


                                        @if ($question->type === 'likert_scale')
                                            <div class="my-4">
                                                <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                                                <input type="hidden" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}">
                                                <input type="hidden" name="questions[{{ $question->id }}][required]"value="{{ $question->required }}">

                                                <p class="text-sm text-center text-gray-500">
                                                    {{ $lang === 'ar' ? 'حدد مستوى موافقتك على العبارة التالية' : 'Please indicate your level of agreement with the following statement' }}
                                                </p>
                                                <div class="flex justify-center w-full mt-2 space-x-2">
                                                    @foreach ($question->options as $option)
                                                        <div class="flex flex-col items-center justify-center space-y-2">
                                                            <label for="likert_option_{{ $option->id }}"
                                                                class="w-full text-center text-gray-700 ">
                                                                {{ $option->content }}
                                                            </label>
                                                            <input id="likert_option_{{ $option->id }}"
                                                                name="questions[{{ $question->id }}][scale_value]"
                                                                type="radio" value="{{ $option->content }}"
                                                                class="border-gray-300 text-primary h-7 w-7 focus:ring-primary/70">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif


                                        @if ($question->type === 'single_choice')
                                            <p class="text-sm text-gray-500">
                                                {{ $lang === 'ar' ?
                                                    'اختر خيارًا لخانة الاختيار'
                                                    : 'Choose one option'
                                                }}.
                                            </p>
                                            <input type="hidden" name="questions[{{ $question->id }}][id]" value="{{ $question->id }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}">
                                            <input type="hidden" name="questions[{{ $question->id }}][required]" value="{{ $question->required }}">

                                            @foreach ($question->options as $option)
                                                <label class="flex items-center justify-start space-x-2 space-y-2">
                                                    <input class="w-6 h-6 text-primary" type="radio"
                                                        name="questions[{{ $question->id }}][selected_option]"
                                                        value="{{ $option->id }}">
                                                    <span
class="px-4 py-2 font-bold text-white border border-gray-300 rounded-full bg-primary hover:bg-primary/25 hover:text-black">{{ $option->content }}</span>
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-end w-full px-8 mt-4 space-x-4 rtl:flex-row-reverse">
                            <button type="button"
                                @click.prevent="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                                :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === 0 }"
                                class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                                style="background-color: {{ $quiz->bg_color }}"
                                :disabled="currentSlide === 0">{{ $lang === 'ar' ? 'السابق' : 'Previous' }}</button>
                            <button type="button" @click.prevent="currentSlide = (currentSlide + 1) % totalSlides"
                                :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === totalSlides - 1 }"
                                class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                                style="background-color: {{ $quiz->bg_color }}"
                                :disabled="currentSlide === totalSlides - 1">{{ $lang === 'ar' ? 'التالي' : 'Next' }}</button>
                            <!-- Submit Button -->
                            <button type="submit" class="px-4 py-2 text-white rounded focus:outline-none"
                                :class="{
                                    'bg-red-500': currentSlide !== totalSlides - 1,
                                    'bg-green-500': currentSlide === totalSlides - 1
                                }">
                                <span x-text="currentSlide !== totalSlides - 1 ? (lang === 'ar' ? 'المغادرة' : 'Leave') : (lang === 'ar' ? 'إرسال الاختبار' : 'Submit Quiz')"></span>
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
