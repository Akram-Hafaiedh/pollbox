<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        <div class="w-64 h-screen py-8 text-gray-600 bg-gray-100 shadow-md dark:bg-gray-800 dark:text-gray-200">
            @if (auth()->user()->hasRole('admin'))
            <x-sidebar />
            @endif
        </div>
        <x-dashboard-main-content :page-title="  __('Admin Create New User')">
            <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin Clients index page!</h3>
            <div class="flex items-center justify-between" x-data="{questions:[]}">
                <div class="w-full bg-white dark:bg-gray-800" focusable>
                    <form method="post" action="{{ route('admin.users.store') }}" class="p-6">
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
                            {{-- <div class="w-full ml-4 md:w-1/3">
                                <x-input-label for="number_questions" :value="__('Number of questions')" />

                                <x-text-input id="number_questions" class="w-full mt-1 " type="number"
                                    :value="old('number_questions')" name="number_questions" required
                                    autocomplete="number_questions" />

                                <x-input-error :messages="$errors->get('number_questions')" class="mt-2" />

                            </div> --}}
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('description')" />
                            <x-text-area rows="4" id="description" class="block w-full mt-1" name="description"
                                :value="old('description')" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div> --}}
                        <template x-for="(question, index) in questions" :key="index">
                            <div class="mt-4">
                                <label :for="'question_' + index" class="block text-sm font-medium text-gray-600">{{
                                    __('Question') }} <span x-text="index + 1"></span></label>
                                <x-text-input :id="'question_' + index" class="w-full mt-1" type="text"
                                    x-model="questions[index].content" required />
                                <!-- Add other question fields as needed -->

                                <button type="button" @click="questions.splice(index, 1)"
                                    class="px-4 py-2 mt-2 text-white bg-red-500 rounded-md">{{ __('Remove Question')
                                    }}</button>
                            </div>
                        </template>
                        <button type="button" @click="questions.push({})"
                            class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md">
                            {{ __('Add Question') }}
                        </button>



                        <div class="flex justify-end mt-6">
                            <a href="{{ route('admin.quizzes.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ms-3 dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{
                                __('Create User') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>