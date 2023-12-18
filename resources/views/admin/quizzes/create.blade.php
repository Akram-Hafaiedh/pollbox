<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        <div class="w-64 h-screen py-8 text-gray-600 bg-gray-100 shadow-md dark:bg-gray-800 dark:text-gray-200">
            @if (auth()->user()->hasRole('admin'))
            <x-sidebar />
            @endif
        </div>
        {{-- TODO make the page title admin > users > create --}}
        <x-dashboard-main-content :page-title="  __('Admin Create New Quizz')">
            <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin Quizz creation page!</h3>
            <div class="flex items-center justify-between" x-data="{questions:[{content:'', options:['']}]}">
                <div class="w-full bg-white dark:bg-gray-800" focusable>
                    <form method="post" action="{{ route('admin.quizzes.store') }}" class="p-6">
                        @csrf
                        <h2 class="mb-4 text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Create New User') }}
                        </h2>
                        <!-- Add your user creation form fields here -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="flex mt-4 space-y-3 md:space-y-0 md:flex-row md:items-center">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="time_limit" :value="__('Time Limit (mins)')" />

                                <x-text-input id="time_limit" class="w-full mt-1" type="number"
                                    :value="old('time_limit')" name="time_limit" required autocomplete="time_limit" />

                                <x-input-error :messages="$errors->get('time_limit')" class="mt-2" />

                            </div>
                            <div class="w-full ml-4 md:w-1/2">
                                <x-input-label for="score" :value="__('Score')" />

                                <x-text-input id="score" class="w-full mt-1 " type="number" :value="old('score')"
                                    name="score" required autocomplete="score" />

                                <x-input-error :messages="$errors->get('score')" class="mt-2" />

                            </div>
                        </div>
                        <div class="flex mt-4 space-y-3 md:space-y-0 md:flex-row md:items-center">
                            <!-- Visibility-->
                            <div class="w-full md:w-1/4">
                                <x-input-label for="visibility" :value="__('Visibility')" />

                                <select id="visibility" name="visibility"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                    <option value="private">Restricted</option>
                                </select>

                                <x-input-error :messages="$errors->get('visibility')" class="mt-2" />

                            </div>
                            <!-- Active -->
                            <div class="w-full ml-4 md:w-1/4">
                                <x-input-label for="active" :value="__('Active')" />


                                <x-switch :initial-value="true" name="active" />

                                <x-input-error :messages="$errors->get('active')" class="mt-2" />

                            </div>
                            <!-- Has_Correct_Answers -->
                            <div class="w-full ml-4 md:w-1/4">
                                <x-input-label for="has_correct_answers" :value="__('Correct Answers')" />

                                <x-switch name="has_correct_answers" />

                                <x-input-error :messages="$errors->get('has_correct_answers')" class="mt-2" />

                            </div>
                            <!-- Randomize -->
                            <div class="w-full ml-4 md:w-1/4">
                                <x-input-label for="randomize" :value="__('Has random order')" />

                                {{--
                                <x-text-input id="randomize" class="w-full mt-1 " type="number"
                                    :value="old('randomize')" name="randomize" required autocomplete="randomize" /> --}}

                                <x-switch name="randomize" />

                                <x-input-error :messages="$errors->get('randomize')" class="mt-2" />

                            </div>

                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-area rows="4" id="description" class="block w-full mt-1" name="description"
                                :value="old('description')" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <template x-for="(question, index) in questions" :key="index">
                            <div class="p-2 mt-4 border-2 rounded dark:border-white/40">
                                <!-- label for question-->
                                <label :for="'question_' + index"
                                    class="block text-sm font-medium text-gray-600 dark:text-gray-100">{{
                                    __('Question') }} <span x-text="index + 1"></span></label>
                                <!-- Input for questions -->
                                <input type="text" x-model="question.content"
                                    :name="'questions[' + index + '][content]'"
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    required />
                                <div class="flex flex-row items-center w-full mt-2 space-x-2">
                                    <!-- Type -->
                                    <div class="w-1/4 mt-2 md:mt-0">
                                        <label :for="'type_' + index"
                                            class="block text-sm font-medium text-gray-600 dark:text-gray-100">
                                            {{ __('Type') }}
                                        </label>
                                        <select x-model="question.type" :name="'questions[' + index + '][type]'"
                                            :id="'type_' +  index "
                                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="single_choice">Single Choice</option>
                                            <option value="open_ended">Open Ended</option>
                                            <!-- Add other options as needed -->
                                        </select>
                                    </div>
                                    <!-- Difficulty -->
                                    <div class="w-1/4 mt-2 md:mt-0">
                                        <label :for="'difficulty_' + index"
                                            class="block text-sm font-medium text-gray-600 dark:text-gray-100">
                                            {{ __('Difficulty') }}
                                        </label>
                                        <select x-model="question.difficulty"
                                            :name="'questions[' + index + '][difficulty]'" :id="'difficulty_' +  index "
                                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                            <option value="easy">Easy</option>
                                            <option value="medium">Medium</option>
                                            <option value="hard">Hard</option>
                                            <!-- Add other options as needed -->
                                        </select>
                                    </div>
                                    <!-- Order -->
                                    <div class="w-1/4 mt-2 md:mt-0">
                                        <label :for="'order_' + index"
                                            class="block text-sm font-medium text-gray-600 dark:text-gray-100">
                                            {{ __('Order') }}
                                        </label>
                                        <input x-model="question.order" :name="'questions[' + index + '][order]'"
                                            :id="'order_' +  index "
                                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            type="number" min="0" required />
                                    </div>
                                    <!-- Required -->
                                    <div class="w-1/4 mt-2 md:mt-0">
                                        <label :for="'required_' + index"
                                            class="block text-sm font-medium text-gray-600 dark:text-gray-100">
                                            {{ __('Required') }}
                                        </label>
                                        <select x-model="question.required" :name="'questions[' + index + '][required]'"
                                            :id="'required' +  index "
                                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                            <!-- Add other options as needed -->
                                        </select>
                                        {{--
                                        <x-switch x-model="question.required"
                                            name="'questions[' + index + '][required]'" /> --}}
                                    </div>

                                </div>
                                <div class="flex items-center justify-end space-x-2">

                                    <!-- Button for Addding options to question-->
                                    <button type="button" @click="question.options.push('')"
                                        class="inline-flex items-center px-4 py-2 mt-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{
                                        __('Add Option')
                                        }}</button>

                                    <!-- Remove question button-->
                                    <button type="button" @click="questions.splice(index, 1)"
                                        class="inline-flex items-center px-4 py-2 mt-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{
                                        __('Remove Question')
                                        }}</button>
                                </div>
                                <!-- Options for the current question -->
                                <template x-for="(option, optionIndex) in question.options" :key="optionIndex">
                                    <div>
                                        <!-- Label for option-->
                                        <label :for="'option_' + index + '_' + optionIndex"
                                            class="block text-sm font-medium text-gray-600 dark:text-gray-100">
                                            {{ __('Option') }} <span x-text="optionIndex + 1"></span>
                                        </label>
                                        <div class="flex flex-row items-center space-x-2">
                                            <!-- Input for option-->
                                            <input :id="'option_' + index + '_' + optionIndex"
                                                :name="'questions[' + index + '][options][' + optionIndex + ']'"
                                                class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                                type="text" required />
                                            <!-- Remove option button -->
                                            <button type="button" @click="question.options.splice(optionIndex, 1)"
                                                class="px-4 py-2 text-white bg-red-500 rounded-md">
                                                <span class="sr-only">{{__('Remove Option') }}</span> X
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <!-- Button for adding question -->
                        <button type="button" @click="questions.push({content: '', options: ['']})"
                            class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md">
                            {{ __('Add Question') }}
                        </button>
                        {{-- <button type="button" @click="questions.push({})"
                            class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md">
                            {{ __('Add Question') }}
                        </button> --}}
                        <div class="flex justify-end mt-6">
                            <a href="{{ route('admin.quizzes.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ms-3 dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{
                                __('Create Quizz') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>