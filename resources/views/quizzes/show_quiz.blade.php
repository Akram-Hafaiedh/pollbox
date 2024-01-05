@php
$dir = $quiz->language === 'ar' ? 'rtl' : 'ltr';
$lang = $quiz->language;
@endphp

<x-app-layout :$dir :$lang>
    <div class="container mx-auto my-8"
        style="background-color: {{ $quiz->color }}"
        >
        <h1 class="mb-4 text-3xl font-semibold">{{ $quiz->title }} ({{ $quiz->language }}) - ({{ $quiz->color }})</h1>
        {{-- quiz.blade.php --}}

        <form method="POST" action="{{ route('user.quizzes.submit', $quiz) }}" class="space-y-6">
            @csrf {{-- CSRF token for security --}}

            @foreach ($quiz->questions as $index => $question)
            <div class="space-y-4 question">
                <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700"><span class="text-xl font-bold">{{ $lang==='ar' ?'السؤال' : 'Question' }} {{ $index }} :</span>  {{
                    $question->content }} <span>{{ $question->required ? '*' : '' }}</span> ({{ $question->type }}) </label>

                {{-- @if ($question->image_path)
                <img src="{{ asset($question->image_path) }}" alt="Question Image">
                @endif

                @if ($question->video_url)
                <iframe width="560" height="315" src="{{ $question->video_url }}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                @endif --}}

                {{--!Validation--}}
                @if ($question->type == 'text')
                    <div class="px-2">
                        <input type="text" name="responses[{{ $question->id }}]"
                        id="question_{{ $question->id }}" required="{{ $question->required }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                @elseif($question->type == 'feedback')
                    <div class="px-2">
                        <textarea name="responses[{{ $question->id }}]" id="question_{{ $question->id }}"
                            required="{{ $question->required }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                @elseif($question->type == 'single_choice')
                    <div class="flex flex-col px-2 space-y-2">
                        @foreach ($question->options as $option)
                        <label class="inline-flex items-center">
                            <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option->id }}"
                                required="{{ $question->required }}"
                                class="text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2">{{ $option->content }}</span>
                        </label>
                        @endforeach
                    </div>
                @elseif($question->type == 'multiple_choice')
                    <div class="flex flex-col px-2 space-y-2">
                        @foreach ($question->options as $option)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="responses[{{ $question->id }}][]" value="{{ $option->id }}"
                                class="text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2">{{ $option->content }}</span>
                        </label>
                        @endforeach
                    </div>
                @elseif($question->type == 'dropdown')
                    <div class="mt-4">
                        <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700">
                            {{ $question->content }} {{ $question->required ? '*' : '' }}
                        </label>
                        <select id="question_{{ $question->id }}" name="responses[{{ $question->id }}]"
                            required="{{ $question->required ? 'required' : '' }}"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select an option</option>
                            @foreach ($question->options as $option)
                            <option value="{{ $option }}">{{ $option->content }}</option>
                            @endforeach
                        </select>
                    </div>
                @elseif($question->type == 'slider')
                    <div class="w-1/4 px-2 mt-4">
                        <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700">
                            {{-- {{ $question->content }} --}}
                            <span class="text-gray-400">(Value: <span id="sliderValue_{{ $question->id }}">50</span>)</span>
                            {{-- {{ $question->required ? '*' : '' }} --}}
                        </label>
                        <input type="range" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]" min="0"
                            max="100" value="50" step="1" required="{{ $question->required ? 'required' : '' }}"
                            class="block w-full h-2 mt-1 bg-gray-200 rounded-full appearance-none cursor-pointer focus:outline-none focus:ring-0 focus:bg-indigo-600"
                            oninput="document.getElementById('sliderValue_{{ $question->id }}').textContent = this.value" />
                    </div>
                @elseif($question->type == 'likert_scale')
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
                @elseif($question->type == 'numeric')
                    <div class="px-2 mt-4">
                        <label for="question_{{ $question->id }}"
                            class="block text-sm font-medium text-gray-700 sr-only ">
                            {{ $question->content }}
                            {{ $question->required ? '*' : '' }}
                        </label>
                        <input type="number" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]"
                            class="block w-full py-2 pl-2 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required="{{ $question->required ? 'required' : '' }}" />
                    </div>
                @elseif($question->type == 'ranking')
                    <div class="px-2" x-data="{ list: {{ json_encode($question->options) }}, dragIndex: null }"
                        x-init="() => { new Sortable($el, { animation: 150 })}">
                        <template x-for="(item, index) in list" :key="index" x-on:mousedown="dragIndex = null">
                            <div x-text="item.content" x-on:mousedown="dragIndex = index"
                                x-on:touchstart="dragIndex = index" x-on:mouseup="dragIndex = null"
                                x-on:touchend="dragIndex = null" :class="{ 'bg-indigo-200': dragIndex === index }">
                            </div>
                        </template>
                    </div>
                @elseif($question->type == 'date')
                    <div class="px-2">
                        <input type="date" name="date_question" value="{{ old('date_question') }}"
                    class="block w-full px-4 py-2 leading-normal text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                @elseif($question->type == 'file_upload')
                    <label class="block px-2">
                        <span class="sr-only">Choose file</span>
                        <input type="file" name="file_upload"
                            class="block w-full text-sm text-gray-500 bg-white rounded file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                    </label>
                @endif
            </div>
                @endforeach
            <button class="px-4 py-2 font-bold text-white bg-indigo-600 rounded-md rtl:ml-auto ltr:mr-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50"
                type="submit"
                >Submit Quiz
            </button>
        </form>


    </div>
</x-app-layout>
