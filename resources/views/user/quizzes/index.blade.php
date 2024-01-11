

<x-app-layout>

    <div class="container mx-auto my-8" x-data="{ searchTerm: '', filterVisibility: '' }">
        <div class="flex justify-between">
            <h1 class="mb-4 text-3xl font-semibold">{{ $user->name }}'s Quizzes</h1>
        </div>
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
                class="relative p-6 text-white transition-transform transform border-2 border-transparent rounded-lg hover:border-gray-800 hover:scale-105 hover:shadow-lg"  style="background-color: {{ $quiz->color }}">
                <!-- Using Blade-->
                <!-- <h2 class="w-full mb-2 text-xl font-bold">#{{ $quiz->id }}-{{ $quiz->title }}
                    <span
                        class="text-sm rounded-full mr-auto text-white py-1 px-2 @if ($quiz->visibility === 'public') bg-green-500 @elseif($quiz->visibility === 'private') bg-red-500 @elseif($quiz->visibility === 'restricted') bg-blue-500 @endif">
                        {{ Str::ucfirst($quiz->visibility) }}</span>
                </h2> -->
                <h2 x-data="{ visibility: '{{ $quiz->visibility }}' }" class="w-full mb-2 text-xl font-bold">
                    #{{ $quiz->id }}-{{ $quiz->title }}
                    <span x-text="visibility.charAt(0).toUpperCase() + visibility.slice(1)"
                        x-bind:class="{ 'bg-green-500': visibility === 'public', 'bg-red-500': visibility === 'private', 'bg-blue-500': visibility === 'restricted' }"
                        class="px-2 py-1 mr-auto text-sm text-white rounded-full"></span>
                </h2>
                <p class="mb-4">{{ $quiz->description }}</p>
                <div class="w-full h-2 mb-4 bg-gray-200 rounded">
                    <div class="h-2 max-w-md bg-green-500 rounded" style="width:{{ $quiz->questions->count() > 0
                                    ? (auth()->user()->responses()->where('quiz_id', $quiz->id)->count() /
                                            $quiz->questions->count()) *
                                        100
                                    : 0 }}%;">
                    </div>
                </div>

                <p class="mb-4">
                    {{ round(
                    $quiz->questions->count() > 0
                    ? (auth()->user()->responses()->where('quiz_id', $quiz->id)->count() /
                    $quiz->questions->count()) *
                    100
                    : 0,
                    ) }}
                    % complete</p>
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
        {{--
        <!-- Fade Background -->
        <div x-show="showModal" class="fixed inset-0 bg-black opacity-50" @click="showModal = false"></div>

        <!-- Modal -->
        <div x-show="showModal" @click.away="showModal = false; console.log('away');"
            class="fixed inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="p-6 bg-white rounded-lg shadow-xl">
                    <!-- Code Input Form -->
                    <form action="{{ route('user.quizzes.show', $quiz) }}" method="post">
                        @csrf
                        <label for="code" class="block text-sm font-medium text-gray-700">Enter 4-digit Code:</label>
                        <input type="text" name="code" id="code" class="p-2 mt-1 border rounded-md" maxlength="4">
                        <button type="submit" class="p-2 mt-2 text-white bg-blue-500 rounded-md">Submit</button>
                    </form>
                </div>
            </div>
        </div> --}}
        @else
        <p class="text-gray-500">No quizzes found for {{ $user->name }}.</p>
        @endif
    </div>

</x-app-layout>
