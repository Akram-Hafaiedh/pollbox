

<x-app-layout>

    <x-dashboard-main-content :page-title="__('My Quizzes')">
    <div class="container mx-auto my-8" x-data="{ searchTerm: '', filterVisibility: '' }">

        @if (session('error'))
        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
        @if (session('success'))
        <div class="relative px-4 py-3 text-green-700 bg-red-100 border border-green-400 rounded" role="success">
            <strong class="font-bold">Success</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <div class="flex justify-between my-4">
            <div>
                <button @click="filterVisibility = ''" :class="{ 'bg-blue-500 text-white': filterVisibility === '' }"
                    class="px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue">All</button>
                <button @click="filterVisibility = 'public'"
                    :class="{ 'bg-blue-500 text-white': filterVisibility === 'public' }"
                    class="px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue">Public</button>
                <button @click="filterVisibility = 'private'"
                    :class="{ 'bg-blue-500 text-white': filterVisibility === 'private' }"
                    class="px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue">Private</button>
                <button @click="filterVisibility = 'restricted'"
                    :class="{ 'bg-blue-500 text-white': filterVisibility === 'restricted' }"
                    class="px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue">Restricted</button>
            </div>

            <input type="text" x-model="searchTerm" placeholder="Search...">
        </div>
        @if ($quizzes->count() > 0)
        <div class="grid grid-cols-1 gap-6 pt-4 bg-white border-t border-gray-200 shadow-sm lg:grid-cols-3">
            @foreach ($quizzes as $quiz)
            <!-- <div @click.stop="showModal = true" class="relative p-6 bg-gray-200 border-2 border-transparent rounded-lg cursor-pointer hover:border-gray-800"> -->
            <a x-show="
                (searchTerm==='' || '{{ strtolower($quiz->title) }}'.includes(searchTerm.toLowerCase()))&&
                (filterVisibility === '' || '{{ strtolower($quiz->visibility) }}' === filterVisibility.toLowerCase())"
                href="{{ route('user.quizzes.show', $quiz) }}"
                class="relative p-6 text-white transition-transform transform border-2 border-transparent rounded-lg hover:border-gray-800 hover:scale-105 hover:shadow-lg"  style="background-color: {{ $quiz->bg_color }};color:{{ $quiz->text_color }}">
                <h2 x-data="{ visibility: '{{ $quiz->visibility }}' }" class="w-full mb-2 text-xl font-bold">
                    #{{ $quiz->id }}-{{ $quiz->title }}
                    <span x-text="visibility.charAt(0).toUpperCase() + visibility.slice(1)"
                        x-bind:class="{ 'bg-green-500': visibility === 'public', 'bg-red-500': visibility === 'private', 'bg-blue-500': visibility === 'restricted' }"
                        class="px-2 py-1 mr-auto text-sm text-white rounded-full"></span>
                </h2>
                <p class="mb-4">{{ $quiz->description }}</p>
                <div class="w-full h-2 mb-4 bg-gray-200 rounded">
                    <div class="h-2 max-w-md bg-green-500 rounded"
                    style="width:{{ $quiz->questions->count() > 0  ? (auth()->user()->responses()->where('quiz_id', $quiz->id)->pluck('question_id')->unique()->count() /  $quiz->questions->count()) * 100  : 0 }}%;">
                    </div>
                </div>

                <p class="mb-4">
                    {{
                        round(
                            $quiz->questions->count() > 0
                            ? (auth()->user()->responses()
                                    ->where('quiz_id', $quiz->id)
                                    ->distinct('question_id')
                                    ->count('question_id') / $quiz->questions->count()) * 100
                            : 0
                        )
                    }}% complete
                </p>

                @if ($quiz->visibility === 'restricted')
                <div class="flex items-center">
                    <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Norman Walters profile picture">
                    </div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                        Si
                    </div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                        Ah
                    </div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                        Ka
                    </div>

                    <button class="w-10 h-10 bg-white rounded-full">+</button>
                </div>
                @endif
                <div class="absolute top-0 right-0 p-2">
                    <button class="text-gray-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="grid w-full grid-rows-1 grid-cols-1 min-h-[50vh] bg-gray-100 justify-center items-center">
            <p class="text-center text-gray-500">No quizzes found for {{ $user->name }}.</p>
        </div>
        @endif
    </div>
    </x-dashboard-main-content>
</x-app-layout>
