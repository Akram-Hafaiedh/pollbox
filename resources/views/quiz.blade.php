<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 x-data=" { currentQuestion: 1, totalQuestions: {{ count($questions) }} }"">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Top progress bar -->
                <div>
                    <progress max="{{ count($questions) }}" :value="currentQuestion"></progress>
                    <span x-text="currentQuestion + ' / ' + totalQuestions"></span>
                </div>
                <!-- Question description -->
                <div>
                    <h2>Question <span x-text="currentQuestion"></span></h2>
                    <p x-text="$wire('questions.' + currentQuestion + '.description')"></p>
                    <!-- Add your form inputs for user answers here -->
                </div>
                <!-- Navigation buttons -->
                <div>
                    <button x-show="currentQuestion > 1" @click="currentQuestion -= 1">Previous</button>
                    <button x-show="currentQuestion < totalQuestions" @click="currentQuestion += 1">Next</button>
                    <button x-show="currentQuestion === totalQuestions">Submit</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>