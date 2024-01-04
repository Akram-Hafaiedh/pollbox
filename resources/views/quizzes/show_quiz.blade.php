<x-app-layout>
    <div class="container mx-auto my-8">
        <h1 class="mb-4 text-3xl font-semibold">{{ $quiz->title }}</h1>
        {{-- quiz.blade.php --}}

        <form method="POST" action="" class="space-y-6">
            @csrf {{-- CSRF token for security --}}

            @foreach ($quiz->questions as $question)
            <div class="space-y-4 question">
                <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700">{{
                    $question->content }} {{ $question->required ? '*' : '' }} ({{ $question->type }}) </label>

                {{-- Check the type of question and render the appropriate HTML input --}}
                @if($question->type == 'text')
                <input type="text" name="responses[{{ $question->id }}]" id="question_{{ $question->id }}"
                    required="{{ $question->required }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @elseif($question->type == 'feedback')
                <textarea name="responses[{{ $question->id }}]" id="question_{{ $question->id }}"
                    required="{{ $question->required }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @elseif($question->type == 'single_choice')
                <div class="flex flex-col space-y-2">
                    @foreach($question->options as $option)
                    <label class="inline-flex items-center">
                        <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option->id }}"
                            required="{{ $question->required }}"
                            class="text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2">{{ $option->content }}</span>
                    </label>
                    @endforeach
                </div>
                @elseif($question->type == 'multiple_choice')
                <div class="flex flex-col space-y-2">
                    @foreach($question->options as $option)
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
                        @foreach($question->options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                @elseif($question->type == 'slider')
                <div class="w-1/4 mx-auto mt-4">
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
                <div class="mt-4">
                    <label for="question_{{ $question->id }}"
                        class="block mb-2 text-sm font-medium text-gray-700 sr-only">
                        {{ $question->content }}
                        {{ $question->required ? '*' : '' }}
                    </label>
                    <div class="flex justify-between">
                        @php($likertScale = range(1, 10)) {{-- Adjust the range for your Likert scale (e.g., 1-7) --}}
                        @foreach($likertScale as $value)
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
                <div class="mt-4">
                    <label for="question_{{ $question->id }}" class="block text-sm font-medium text-gray-700 sr-only ">
                        {{ $question->content }}
                        {{ $question->required ? '*' : '' }}
                    </label>
                    <input type="number" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]"
                        class="block w-full py-2 pl-2 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required="{{ $question->required ? 'required' : '' }}" />
                </div>
                @elseif($question->type == 'ranking')
                <div x-data="{
                    options: @json($question->options),
                    dragItem: null,
                    dragOver(index) {
                        if (this.dragItem === null || this.dragItem === index) return;
                        const item = this.options.splice(this.dragItem, 1)[0];
                        this.options.splice(index, 0, item);
                        this.dragItem = index;
                    }
                }">
                    <script>
                        console.log(@json($question->options));
                    </script>

                    <template x-for="(option, index) in options" :key="option.id">
                        <div :draggable="true" @dragstart="dragItem = index" @dragover.prevent="dragOver(index)"
                            @dragend="dragItem = null" @drop.prevent="dragItem = null"
                            class="p-2 mb-2 border cursor-move">
                            <!-- Ensure the name attribute is correct for your backend processing -->
                            <input type="hidden" :name="'options[' + option.id + '].rank'" x-model="option.rank">
                            <!-- Ensure the option object has a 'content' property -->
                            <div x-text="option.content"></div>
                        </div>
                    </template>
                </div>
                @endif

            </div>
            @endforeach

            <button type="submit"
                class="px-4 py-2 font-bold text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">Submit
                Quiz</button>
        </form>
    </div>
</x-app-layout>