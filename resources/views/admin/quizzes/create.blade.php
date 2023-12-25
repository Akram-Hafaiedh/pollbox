<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        {{-- TODO make the page title admin > users > create --}}
        <x-dashboard-main-content :page-title="__('Admin Quizz Creation')">
            <div class="flex flex-col items-center justify-between bg-gray-200" x-data="{
                questions: {{ old('questions') ? json_encode(old('questions')) : '[{content: \'\', options: [\'\', \'\']}]' }},

                    hasCorrectAnswers: true,
                    removeOption: function(index, optionIndex) {
                        console.log('Removing option', optionIndex, 'From question', index);
                        this.questions[index].options.splice(optionIndex, 1);
                    }
                }" x-init="console.log($refs)">

                {{-- x-data="{questions:[{content:'', options:['','']}] , hasCorrectAnswers: true }"
                x-init="console.log($refs)"> --}}

                {{--
                @php
                $oldQuestions = old('questions');
                if (is_array($oldQuestions)) {
                echo '
                <pre>';
                    print_r($oldQuestions);
                    echo '</pre>';
                }
                @endphp --}}

                @if ($errors->any())
                <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <strong class="font-bold">Validation errors:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('admin.quizzes.store') }}" class="w-full p-6">
                    @csrf
                    <!-- Title-->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" autofocus autocomplete="title" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div
                        class="flex flex-col mt-4 space-x-0 space-y-3 lg:space-x-2 lg:space-y-0 lg:flex-row md:items-center">
                        <!-- Time Limit -->
                        <div class="w-full lg:w-1/3">
                            <x-input-label for="time_limit" :value="__('Time Limit (mins)')" />

                            <x-text-input id="time_limit" class="w-full mt-1" type="number" :value="old('time_limit')"
                                name="time_limit" required autocomplete="time_limit" />

                            <x-input-error :messages="$errors->get('time_limit')" class="mt-2" />

                        </div>
                        <!-- Score -->
                        <div class="w-full lg:w-1/3">
                            <x-input-label for="score" :value="__('Score')" />

                            <x-text-input id="score" class="w-full mt-1 " type="number" :value="old('score')"
                                name="score" required autocomplete="score" />

                            <x-input-error :messages="$errors->get('score')" class="mt-2" />

                        </div>
                        <!-- Visibility-->
                        <div class="w-full lg:w-1/3">
                            <x-input-label for="visibility" :value="__('Visibility')" />

                            <select id="visibility" name="visibility"
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="restricted">Restricted</option>
                            </select>

                            <x-input-error :messages="$errors->get('visibility')" class="mt-2" />

                        </div>
                    </div>
                    <!---Radio-Buttons  + selected users -->
                    <div class="flex flex-col mt-4 space-y-3 md:space-y-0 lg:flex-row md:items-center">

                        <!-- Active -->
                        <div class="w-full ml-4 lg:w-1/4">
                            <div class="mt-2">
                                <input type="checkbox" id="active" name="active" value="1" {{ old('active') ? 'checked'
                                    : '' }}
                                    class="w-5 h-5 text-indigo-600 border-gray-300 rounded form-checkbox focus:ring-indigo-500">
                                <label for="active" class="ml-2 text-gray-700">Active</label>
                            </div>
                            <x-input-error :messages="$errors->get('active')" class="mt-2" />

                        </div>


                        <!-- Has_Correct_Answers -->
                        <div class="w-full ml-4 lg:w-1/4">

                            <div class="mt-2">
                                <input x-model="hasCorrectAnswers" type="checkbox" id="has_correct_answers" value="1" {{
                                    old('has_correct_answers') ? 'checked' : '' }} name="has_correct_answers"
                                    class="w-5 h-5 text-indigo-600 border-gray-300 rounded form-checkbox focus:ring-indigo-500">
                                <!-- You can style the checkbox according to your design preferences -->
                                <label for="has_correct_answers" class="ml-2 text-gray-700">Has Correct Answers</label>
                            </div>

                            <x-input-error :messages="$errors->get('has_correct_answers')" class="mt-2" />
                        </div>

                        <!-- Randomize -->
                        <div class="w-full ml-4 lg:w-1/4">
                            <div class="mt-2">
                                <input type="checkbox" id="randomize" name="randomize" value="1" {{ old('randomize')
                                    ? 'checked' : '' }}
                                    class="w-5 h-5 text-indigo-600 border-gray-300 rounded form-checkbox focus:ring-indigo-500">
                                <!-- You can style the checkbox according to your design preferences -->
                                <label for="randomize" class="ml-2 text-gray-700">Random Order</label>
                            </div>

                            <x-input-error :messages="$errors->get('randomize')" class="mt-2" />

                        </div>

                        <!--Members-->
                        <div class="w-full pt-4 lg:pt-0 lg:ml-4 lg:w-1/4">

                            <div x-data="{ open: false, selectedUsers: {{ json_encode(old('selected_users', [])) }} }"
                                class="mb-4">
                                <label :for="'users'" class="block mb-2 text-sm font-medium text-gray-600">
                                    {{ __('Select Users to Invite:') }}
                                </label>
                                <div class="relative">
                                    <input type="text" id="selected_users" name="selected_users" x-model="selectedUsers"
                                        x-on:click="open = true"
                                        class="block w-full px-3 py-2 leading-5 bg-white border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring focus:border-blue-300 sm:text-sm"
                                        placeholder="Select users..." multiple readonly>
                                    <div x-show="open" x-on:click.away="open = false"
                                        class="absolute z-50 w-full mt-2 overflow-x-scroll bg-white border border-gray-300 rounded-md shadow-md h-60">
                                        @foreach ($users as $user)
                                        <label class="flex flex-row items-center px-4 py-2 space-x-2 ">
                                            <input type="checkbox" name="selected_users[]" value="{{ $user->id }}"
                                                x-model="selectedUsers" {{ is_array(old('selected_users')) &&
                                                in_array($user->id, old('selected_users')) ? 'checked' : '' }}
                                            class="w-5 h-5 text-indigo-600 border-gray-300 rounded form-checkbox
                                            focus:ring-indigo-500"
                                            >

                                            <p>{{ $user->name }}</p>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('users')" class="mt-2" />
                            </div>

                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area rows="4" id="description" class="block w-full mt-1" name="description"
                            autocomplete="description">{{ old('description') }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>


                    <!-- Questions section -->
                    <template x-for="(question, index) in questions" :key="index">
                        <div class="p-2 mt-4 border border-black border-dashed">
                            <!-- label for question-->
                            <label :for="'question_' + index" class="block text-sm font-medium text-gray-600">{{
                                __('Question') }} <span x-text="index + 1"></span></label>
                            <!-- Input for questions -->
                            <input type="text" x-model="question.content" :name="'questions[' + index + '][content]'"
                                class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required />
                            <div
                                class="flex flex-col items-center w-full my-4 space-y-3 lg:flex-row lg:space-y-0 lg:space-x-3">
                                <!-- Type -->
                                <div class="w-full lg:w-1/4">
                                    <label :for="'type_' + index" class="block text-sm font-medium text-gray-600 ">
                                        {{ __('Type') }}
                                    </label>
                                    <select x-model="question.type" :name="'questions[' + index + '][type]'"
                                        :id="'type_' + index"
                                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ">
                                        <option value="multiple_choice">Multiple Choice</option>
                                        <option value="single_choice">Single Choice</option>
                                        <option value="open_ended">Open Ended</option>
                                        <!-- Add other options as needed -->
                                    </select>
                                </div>
                                <!-- Difficulty -->
                                <div class="w-full lg:w-1/4">
                                    <label :for="'difficulty_' + index" class="block text-sm font-medium text-gray-600">
                                        {{ __('Difficulty') }}
                                    </label>
                                    <select x-model="question.difficulty" :name="'questions[' + index + '][difficulty]'"
                                        :id="'difficulty_' + index"
                                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ">
                                        <option value="easy">Easy</option>
                                        <option value="medium">Medium</option>
                                        <option value="hard">Hard</option>
                                        <!-- Add other options as needed -->
                                    </select>
                                </div>
                                <!-- Order -->
                                <div class="w-full lg:w-1/4 ">
                                    <label :for="'order_' + index" class="block text-sm font-medium text-gray-600 ">
                                        {{ __('Order') }}
                                    </label>
                                    <input x-model="question.order" :name="'questions[' + index + '][order]'"
                                        :id="'order_' + index"
                                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "
                                        type="number" min="0" />
                                </div>
                                <!-- Required -->
                                <div class="w-full lg:w-1/4">
                                    <label :for="'required_' + index" class="block text-sm font-medium text-gray-600">
                                        {{ __('Required') }}
                                    </label>
                                    <select x-model="question.required" :name="'questions[' + index + '][required]'"
                                        :id="'required' + index"
                                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        <!-- Add other options as needed -->
                                    </select>
                                </div>

                            </div>
                            <div
                                class="flex flex-col items-center justify-end mt-2 mb-4 space-x-0 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0">
                                <!-- Button for Addding options to question-->
                                <button type="button" @click="question.options.push('')"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md lg:w-max hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">{{
                                    __('Add Option') }}</button>

                                <!-- Remove question button-->
                                <button type="button" @click="questions.splice(index, 1)"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md lg:w-max hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">{{
                                    __('Remove Question') }}</button>
                            </div>


                            <!-- Options for the current question -->

                            <template x-for="(option, optionIndex) in question.options" :key="optionIndex">
                                <div>
                                    <!-- Label for option-->
                                    <div class="flex flex-row items-center justify-between text-xs">
                                        <label :for="'option_' + index + '_' + optionIndex"
                                            class="block text-sm font-medium text-gray-600 ">
                                            {{ __('Option') }} <span x-text="optionIndex + 1"></span>
                                        </label>
                                    </div>
                                    <div class="flex flex-row items-center mr-2 space-x-2">
                                        <!-- Input for option-->
                                        <input :id="'option_' + index + '_' + optionIndex"
                                            :name="'questions[' + index + '][options][' + optionIndex + '][content]'"
                                            x-model="option.content"
                                            class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            type="text" required />
                                        <!-- Checkbox for correct answer -->
                                        <template x-if="hasCorrectAnswers">
                                            <div class="" x-data="{ isCorrect: false }">
                                                <input type="checkbox" value="1"
                                                    :id="'option_' + index + '_' + optionIndex + '_correct'" :name="'questions[' + index + '][options][' + optionIndex +
                                                            '][is_correct]'" x-model="isCorrect"
                                                    class="mx-3 text-indigo-600 border-gray-300 rounded w-7 h-7 form-checkbox focus:ring-indigo-500">
                                                <!-- Add a hidden input to store the actual value in the form submission -->
                                                {{-- <input type="hidden" :name="'questions[' + index + '][options][' + optionIndex +
                                                            '][is_correct]'"
                                                    x-bind:value="isCorrect ? 'true' : 'false'"> --}}
                                            </div>
                                        </template>
                                        <template x-else>
                                            <p>hasCorrectAnswers is undefined</p>
                                        </template>
                                        <!-- Remove option button -->
                                        <button type="button" x-on:click="removeOption(index, optionIndex)"
                                            class="w-8 h-8 text-white bg-red-500 rounded-md">
                                            <span class="sr-only">{{ __('Remove Option') }}</span> X
                                        </button>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </template>
                    <!-- Button for adding question -->
                    <button type="button" @click="questions.push({content: '', options: ['','']})"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md">
                        {{ __('Add Question') }}
                    </button>
                    {{-- <button type="button" @click="questions.push({})"
                        class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md">
                        {{ __('Add Question') }}
                    </button> --}}
                    <div class="flex justify-end mt-6">
                        <a href="{{ route('admin.quizzes.index') }}"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ms-3 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ">{{
                            __('Create Quizz') }}</button>

                    </div>
                </form>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>