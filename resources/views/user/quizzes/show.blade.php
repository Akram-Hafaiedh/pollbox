@php
$dir = $quiz->language === 'ar' ? 'rtl' : 'ltr';
$lang = $quiz->language;
@endphp

<x-app-layout :$dir :$lang>
    <x-slot name="header">
        <h2 class="w-full px-4 py-6 text-xl font-semibold leading-tight text-white" style="background-color: {{ $quiz->color }}">
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
                                :class="{ 'text-white': currentSlide === index - 1, 'bg-gray-300': currentSlide !== index - 1 }"
                                :style="currentSlide === index - 1 ? 'background-color: {{ $quiz->color }}' : ''"
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
                            {{-- <p>{{ $question->type }}</p> --}}
                            <h2 class="mx-auto mt-4 mb-4 text-2xl font-semibold w-fit"> {{ $lang==='ar' ?'السؤال' : 'Question' }} {{ $key + 1 }} - {{
                                $question->content }}
                                <span class="text-red-500">{{$question->required ? '*' : '' }}</span>
                            </h2>

                            {{--! Hidden Input --}}
                            <input type="hidden" name="questions[{{ $question->id }}]" value='{"type":"{{ $question->type }}", "required":{{ $question->required ? "true" : "false" }}}'>

                            @if ($question->image_path)
                            <img class="h-auto mx-auto mb-4" src="{{ asset($question->image_path) }}" alt="Question Image">
                            @endif

                            @if ($question->video_url)
                            <iframe class="mx-auto" width="560" height="315" src="{{ $question->video_url }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            @endif


                            @if($question->type == 'slider')
                            <div class="w-1/4 px-2 mt-4">
                                <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700">
                                    {{-- {{ $question->content }} --}}
                                    <span class="text-gray-400">(Value: <span id="sliderValue_{{ $question->id }}">50</span>)</span>
                                    {{-- {{ $question->required ? '*' : '' }} --}}
                                </label>
                                <input type="range" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]" min="0"
                                    max="100" value="50" step="1" required="{{ $question->required ? 'required' : '' }}"
                                    class="block w-full h-2 mt-1 bg-gray-700 rounded-full appearance-none cursor-pointer focus:outline-none focus:ring-0 focus:bg-indigo-600"
                                    oninput="document.getElementById('sliderValue_{{ $question->id }}').textContent = this.value" />
                            </div>
                            @endif


                            {{-- Options --}}
                            <div class="mx-auto space-y-2">
                                {{-- Check if the question type is 'feedback' --}}
                                @if ($question->type === 'feedback')
                                <p class="text-sm text-gray-500"> {{ $lang==='ar' ?'أدخل إجابتك هنا


                                    ' : 'Enter your answer here' }} .</p>
                                <textarea name="responses[{{ $question->id }}]" id="feedback" rows="6" cols="70"
                                    class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                                @endif


                                @if ($question->type === 'text')
                                <p class="mt-4 text-sm text-gray-500">{{ $lang==='ar' ?'أدخل إجابتك هنا' : 'Enter your answer here' }}</p>
                                <input type="text" name="responses[{{ $question->id }}]" id="question_{{ $question->id }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @endif


                                @if ($question->type === 'multiple_choice')
                                <p class="text-sm text-gray-500">{{ $lang==='ar' ? 'اختر خيارًا أو أكثر لخانة الاختيار متعددة الاختيارات' : 'Choose one or more options' }}.</p>
                                @endif

                                @if($question->type ==='numeric')

                                    <p class="mt-4 text-sm text-gray-500">Choose a number between 1 and 10.</p>
                                    <div class="px-2 mt-4">
                                        <div class="flex justify-between space-x-4">
                                            @php($likertScale = range(1, 10)) {{-- Adjust the range for your Likert scale (e.g., 1-7) --}}
                                            @foreach ($likertScale as $value)
                                            <div class="flex flex-col items-center">
                                                <input type="radio" id="likert_{{ $question->id }}_{{ $value }}"
                                                    name="responses[{{ $question->id }}]" value="{{ $value }}" {{ $question->required ?
                                                'required' : '' }}
                                                class="w-5 h-5 text-indigo-600 form-radio"/>
                                                <label for="likert_{{ $question->id }}_{{ $value }}" class="mt-1 text-xs">{{ $value
                                                    }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif

                                @if($question->type == 'file_upload')
                                    <label class="block px-2">
                                        <span class="">{{ $lang==='ar' ?'أضغط هنا وقم بتحميل ملفك' :'Click here and upload your file' }}</span>
                                        <input type="file" name="file_upload"
                                            class="block w-full text-sm text-gray-500 bg-white rounded file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                                    </label>
                                @endif


                                @if($question->type == 'date')
                                <div class="px-2">
                                    <p>{{  $lang ==='ar' ? 'اختر تاريخًا' :'Choose a date'}}</p>
                                    <input type="date" name="date_question" value="{{ old('date_question') }}"
                                class="block w-full px-4 py-2 leading-normal text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                                @endif

                                @if($question->type =='ranking')
                                <p class="text-sm text-gray-500">Rank your preference from 1 (lowest) to {{
                                    count($question->options) }} (highest).
                                </p>
                                <div class="px-2" x-data="{ list: {{ json_encode($question->options) }}, dragIndex: null }"
                                    x-init="() => { new Sortable($el, { animation: 150 })}">
                                    <template x-for="(item, index) in list" :key="index" x-on:mousedown="dragIndex = null">
                                        <div x-text="item.content" x-on:mousedown="dragIndex = index"
                                            x-on:touchstart="dragIndex = index" x-on:mouseup="dragIndex = null"
                                            x-on:touchend="dragIndex = null" :class="{ 'bg-indigo-200': dragIndex === index }">
                                        </div>
                                    </template>
                                </div>
                                @endif

                                @if($question->type == 'dropdown')
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">{{ $lang==='ar'? 'اختر خيارًا لخانة الاختيار': 'Choose an option.'}} </p>
                                    <select id="question_{{ $question->id }}" name="responses[{{ $question->id }}]"
                                        required="{{ $question->required ? 'required' : '' }}"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select an option</option>
                                        @foreach ($question->options as $option)
                                        <option value="{{ $option }}">{{ $option->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif




                                @if ($question->type === 'single_choice')
                                <p class="text-sm text-gray-500">{{ $lang==='ar'? 'اختر خيارًا لخانة الاختيار' : 'Choose one option '}}.</p>
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

                                {{-- @case('ranking')
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
                                @break --}}

                                @case('numeric')

                                @break

                                @case('likert_scale')
                                    <div class="px-2 mt-4">
                                        <label for="question_{{ $question->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-700 sr-only">
                                            {{ $question->content }}
                                            {{ $question->required ? '*' : '' }}
                                        </label>
                                        <div class="flex justify-between">
                                            @php($likertScale = range(1, 10)) {{-- Adjust the range for your Likert scale (e.g., 1-7) --}}
                                            @foreach ($likertScale as $value)
                                            <div class="flex flex-col items-center">
                                                <input type="radio" id="likert_{{ $question->id }}_{{ $value }}"
                                                    name="responses[{{ $question->id }}]" value="{{ $value }}" {{ $question->required ?
                                                'required' : '' }}
                                                class="w-5 h-5 text-indigo-600 form-radio"/>
                                                <label for="likert_{{ $question->id }}_{{ $value }}" class="mt-1 text-xs">{{ $value
                                                    }}</label>
                                            </div>
                                            @endforeach
                                        </div>
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
                            class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                            style="background-color: {{ $quiz->color }}"
                            :disabled="currentSlide === 0">Previous</button>
                        <button type="button" @click.prevent="currentSlide = (currentSlide + 1) % totalSlides"
                            :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === totalSlides - 1 }"
                            class="px-4 py-2 text-white rounded focus:outline-none disabled:opacity-50"
                            style="background-color: {{ $quiz->color }}"
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
