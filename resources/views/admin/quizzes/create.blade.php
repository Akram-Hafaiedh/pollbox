<x-admin-layout>
    {{-- TODO errors  --}}
    <div class="flex flex-col md:flex-row" x-data="quizForm()">
        @auth
            <x-dashboard-main-content :page-title="__('Creation de quiz')">
                <div class="relative flex flex-col items-center justify-between bg-gray-200">
                    @if (session('success'))
                        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded"
                            role="success">
                            <strong class="font-bold">Success</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

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

                    <form method="post" action="{{ route('admin.quizzes.store') }}" class="w-full p-6 mt-10"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Title-->
                        <div class="my-4">
                            <x-input-label for="title" :value="__('Titre')" />
                            <x-text-input id="title" class="block w-full mt-1 text-sm" type="text" name="title"
                                :value="old('title')" autofocus autocomplete="title" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Dates and Visibility-->
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:my-4">
                            <div>
                                <x-input-label for="start_date" :value="__('Date de départ')" />
                                <x-text-input id="start_date" class="block w-full mt-1 text-sm" type="date" name="start_date"
                                    :value="old('start_date')" autofocus autocomplete="start_date" required />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="end_date" :value="__('Date de fin')" />
                                <x-text-input id="end_date" class="block w-full mt-1 text-sm" type="date" name="end_date"
                                    :value="old('end_date')" autofocus autocomplete="end_date" required />
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="visibility" :value="__('Visibilité')" />
                                <select id="visibility" name="visibility" x-model="quizVisibility"
                                    class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                    <option value="restricted">Restricted</option>
                                </select>
                                <x-input-error :messages="$errors->get('visibility')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="language" :value="__('Langue')" />
                                <select id="languageSelect" name="language" x-model="selectedLanguage"
                                    @change="changeLanguage"
                                    class="w-full p-2 mt-1 text-sm border border-gray-300 rounded focus:outline-none focus:border-primary focus:ring-primary">
                                    <option value="fr">Français</option>
                                    <option value="en">Anglais</option>
                                    <option value="ar">Arabe</option>
                                </select>
                                <x-input-error :messages="$errors->get('language')" class="mt-2" />
                            </div>
                        </div>
                        <!---Radio-Buttons  + selected users -->
                        <div class="flex flex-col mt-4 space-y-3 md:space-y-0 lg:flex-row md:items-center">

                            <!-- Colors -->
                            <div class="w-full px-2 lg:w-1/3">
                                <x-input-label for="bg_color" :value="__('Couleur de fond')" />

                                <input
                                    class="block w-full h-8 mt-1 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="bg_color" type="color" name="bg_color" value="{{ old('bg_color', '#000000') }}"
                                    autofocus autocomplete="bg_color" />

                                <x-input-error :messages="$errors->get('bg_color')" class="mt-2" />
                            </div>

                            <div class="w-full px-2 lg:w-1/3">
                                <x-input-label for="text_color" :value="__('Couleur de texte')" />

                                <input
                                    class="block w-full h-8 mt-1 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="text_color" type="color" name="text_color"
                                    value="{{ old('text_color', '#000000') }}" autofocus autocomplete="text_color" />

                                <x-input-error :messages="$errors->get('text_color')" class="mt-2" />
                            </div>

                            <!--Members-->

                            <div x-show="quizVisibility === 'restricted'" class="w-full lg:pt-0 lg:ml-4 lg:w-1/4">

                                <div x-data="{ open: false, selectedUsers: {{ json_encode(old('selected_users', [])) }} }">
                                    <label :for="'users'" class="block text-sm font-medium text-gray-600 sr-only">
                                        {{ __('Select Users to Invite:') }}
                                    </label>
                                    <div class="relative">
                                        <input type="text" id="selected_users" name="selected_users"
                                            x-model="selectedUsers" x-on:click="open = true"
                                            class="block w-full px-3 py-2 mt-1 leading-5 bg-white border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring focus:border-blue-300 sm:text-sm"
                                            placeholder="Select users..." multiple readonly>
                                        <div x-show="open" x-on:click.away="open = false"
                                            class="absolute z-50 w-full overflow-x-scroll bg-white border border-gray-300 rounded-md shadow-md h-60">
                                            @foreach ($users as $user)
                                                <label class="flex flex-row items-center px-4 py-2 space-x-2 ">
                                                    <input type="checkbox" name="selected_users[]"
                                                        value="{{ $user->id }}" x-model="selectedUsers"
                                                        {{ is_array(old('selected_users')) && in_array($user->id, old('selected_users')) ? 'checked' : '' }}
                                                        class="w-5 h-5 text-indigo-600 border-gray-300 rounded form-checkbox focus:ring-indigo-500">

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

                        <template x-for="(question, questionIndex) in questions" :key="questionIndex">
                            <div class="p-2 mt-4 border border-black border-dashed">
                                <!-- Question content -->
                                <label x-bind:for="'questions[' + questionIndex + '][content]'"
                                    class="block text-sm font-medium text-gray-700">Question <span
                                        x-text="questionIndex + 1"></span></label>
                                <div class="flex justify-center mt-1 space-x-2">
                                    <input x-bind:id="'questions[' + questionIndex + '][content]'"
                                        x-model="question.content" type="text"
                                        :name="'questions[' + questionIndex + '][content]'" placeholder="Question text"
                                        class="w-full text-sm border-gray-300 rounded-md shadow-sm"
                                        x-model="question.content">

                                    <button type="button" @click="removeQuestion(questionIndex)"
                                        class="flex items-center px-3 py-2 text-sm font-medium text-white transition-colors duration-150 ease-in-out bg-red-600 rounded hover:bg-red-700">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        {{-- Remove --}}
                                    </button>

                                </div>
                                <div
                                    class="flex flex-col items-center w-full my-4 space-y-3 lg:flex-row lg:space-y-0 lg:space-x-3">
                                    <!-- Image upload for question -->
                                    <div class="w-full lg:w-1/2">
                                        <label :for="'image_path_' + questionIndex"
                                            class="block text-sm font-medium text-gray-600">
                                            {{ __('Question') }} <span x-text="questionIndex + 1"></span>
                                            {{ __('Image') }}
                                        </label>
                                        <input type="file"
                                        class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md focus:outline-none focus:border-primary focus:ring-1 focus:ring-indigo-500 file:mr-4 file:py-[5px] file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/20 file:text-primary hover:file:text-white hover:file:bg-primary text-slate-500"
                                        :name="'questions[' + questionIndex + '][image_path]'"
                                            x-model="question.image_path" :id="'image_path_' + questionIndex">

                                    </div>
                                    <!-- Video link for question -->
                                    <div class="w-full lg:w-1/2">
                                        <label :for="'video_url_' + questionIndex"
                                            class="block text-sm font-medium text-gray-600">
                                            {{ __('Question') }} <span x-text="questionIndex + 1"></span>
                                            {{ __('Video URL') }}
                                        </label>
                                        <input type="text" id="video_url" placeholder="https://www.youtube.com/embed/UbEpM-VwOU8"
                                            :name="'questions[' + questionIndex + '][video_url]'"
                                            x-model="question.video_url" x-bind:id="'video_url_' + questionIndex"²
                                            class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-center w-full my-4 space-y-3 lg:flex-row lg:space-y-0 lg:space-x-3">
                                    <!-- Type -->
                                    <div class="w-full lg:w-1/2">
                                        <label :for="'type_' + questionIndex"
                                            class="block text-sm font-medium text-gray-600 ">
                                            {{ __('Type de réponse(s)') }}
                                        </label>
                                        <select x-model="question.type" :name="'questions[' + questionIndex + '][type]'"
                                            :id="'type_' + questionIndex"
                                            class="flex w-full mt-1 space-y-2 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="single_choice">Choix unique</option>
                                            <option value="multiple_choice">Choix multiple</option>
                                            <option value="likert_scale">Echelle de notation</option>
                                            <option value="ranking">Classement</option>
                                            <option value="feedback">Commentaire</option>
                                            <!-- Add other options as needed -->
                                        </select>
                                    </div>


                                    <!-- Required -->
                                    <div class="w-full lg:w-1/2">
                                        <label :for="'required_' + questionIndex"
                                            class="block text-sm font-medium text-gray-600">
                                            {{ __('Réponse Requise') }}
                                        </label>
                                        <select x-model="question.required"
                                            :name="'questions[' + questionIndex + '][required]'"
                                            :id="'required' + questionIndex"
                                            class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ">
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                            <!-- Add other options as needed -->
                                        </select>
                                    </div>

                                </div>


                                <!-- Options for the current question -->
                                <template x-if="question.type !== 'feedback' && question.type !== 'likert_scale'">
                                    <template x-for="(option, optionIndex) in question.options" :key="optionIndex">
                                        <div>
                                            <!-- Label for option-->
                                            <div class="flex flex-row items-center justify-between mt-2 text-xs">
                                                <label :for="'option_' + questionIndex + '_' + optionIndex"
                                                    class="block text-sm font-medium text-gray-600 ">
                                                    {{ __('Option') }} <span x-text="optionIndex + 1"></span>
                                                </label>
                                            </div>
                                            <div class="flex flex-row items-center mr-2 space-x-2">
                                                <!-- Input for option-->
                                                <input :id="'option_' + questionIndex + '_' + optionIndex"
                                                    :name="'questions[' + questionIndex + '][options][' + optionIndex +
                                                        '][content]'"
                                                    x-model="option.content"
                                                    class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                    type="text" placeholder="Option text" />
                                                <!-- Remove option button -->
                                                <div class="flex flex-row space-x-2">
                                                    <!-- Remove Option Button -->
                                                    <button type="button"
                                                        @click="removeOption(questionIndex, optionIndex)"
                                                        class="flex items-center px-3 py-2 text-sm font-medium text-white transition-colors duration-150 ease-in-out bg-red-600 rounded hover:bg-red-700">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        {{-- Remove --}}
                                                    </button>

                                                    <!-- Add Option Button -->
                                                    <button type="button" @click="addOption(questionIndex, optionIndex)"
                                                        class="flex items-center px-3 py-2 text-sm font-medium text-white transition-colors duration-150 ease-in-out rounded bg-primary hover:bg-primary/75 ">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        {{-- Add Option --}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                                <template x-if="question.type === 'likert_scale'">
                                    <!-- Render Likert scale options here -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">Likert Options:</label>
                                        <div class="flex flex-col space-y-2">
                                            <template x-for="(likertOption, index) in likertOptions" :key="index">
                                                <div class="flex items-center space-x-2">
                                                    <input type="text" x-model="likertOptions[index].content" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                    <!-- Remove Option Button -->
                                                    {{-- <div class="flex items-center space-x-2">
                                                        <button type="button" @click="addLikertOption(index)" class="px-3 py-2 text-sm font-medium text-white transition-colors duration-150 ease-in-out rounded bg-primary hover:bg-primary/75">
                                           <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        </button>
                                                        <button type="button"
                                                            @click="removeLikertOption(index)"
                                                            class="flex items-center px-3 py-2 text-sm font-medium text-white transition-colors duration-150 ease-in-out bg-red-600 rounded hover:bg-red-700">

                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        </button>
                                                    </div> --}}
                                                </div>
                                            </template>
                                        </div>
                                        <!-- Add Option Button -->

                                    </div>
                                </template>


                            </div>
                        </template>
                        <!-- Button for adding question -->
                        <button type="button" @click="addQuestion"
                            class="px-4 py-2 mt-2 text-sm text-white uppercase rounded-md bg-primary">
                            {{ __('Ajouter une question') }}
                        </button>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary hover:bg-secondary focus:bg-secondary active:bg-secondary focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 ">
                                {{ __('Créer Le Quiz') }}
                            </button>
                            <a href="{{ route('admin.quizzes.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md ms-3 bg-primary hover:bg-secondary focus:bg-secondary active:bg-secondary focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 ">
                                {{ __('Annuler') }}
                            </a>

                        </div>
                    </form>
                </div>
            </x-dashboard-main-content>
        @endauth
    </div>
    <script type="text/javascript">
        // let likertOptions = [{{ Js::from($likertOptions) }}];
        function quizForm() {
            return {
                questions: {{ Js::from(
                    old('questions', [
                        [
                            'content' => '',
                            'options' => [['content' => ''], ['content' => ''], ['content' => '']],
                        ],
                    ]),
                ) }},
                addQuestion() {
                    this.questions.push({
                        content: '',
                        options: [{
                                content: ''
                            },
                            {
                                content: ''
                            },
                            {
                                content: ''
                            }
                        ]
                    });
                },
                removeQuestion(questionIndex) {
                    this.questions.splice(questionIndex, 1);
                },
                addOption(questionIndex, optionIndex) {
                    let newOption = {
                        content: ''
                    };
                    this.questions[questionIndex].options.splice(optionIndex + 1, 0, newOption);
                },
                removeOption(questionIndex, optionIndex) {
                    this.questions[questionIndex].options.splice(optionIndex, 1);
                },
                addLikertOption() {
                    this.likertOptions.push('');
                },
                removeLikertOption(index) {
                    this.likertOptions.splice(index, 1);
                }
            };
        }
        let likertOptions = {!! json_encode($likertOptions) !!};
        let quizVisibility = 'public';
        let selectedLanguage = 'French';
    </script>
</x-admin-layout>
<style>
    /* Targeting the color well in webkit browsers */
    input[type="color"]::-webkit-color-swatch-wrapper {
        padding: 0;
    }

    input[type="color"]::-webkit-color-swatch {
        border: none;
        border-radius: 0.375rem;
    }
</style>
