<x-user-layout>

    <div class="container mx-auto my-8">

        <div x-data="{ quizzes: {{ Js::from($quizzes) }}, quizStatus: 'all', filter: '',
        get filteredQuizzes() {
            if (this.filter === '') {
                return this.quizzes;
            }
            return this.quizzes.filter(quiz => quiz.type === this.filter);
        }}">
            <div class="flex justify-between mx-8 mb-4">
                <h1 class="mb-6 text-3xl font-bold">Quizzes History</h1>
                <div>
                    <label for="quiz-status" class="mr-2 text-gray-600">Filter by Status:</label>
                    <select id="quiz-status" x-model="filter" class="p-2 pr-8 border rounded-md">
                        <option value="">All</option>
                        <option value="finished">Finished</option>
                        <option value="unfinished">Unfinished</option>
                    </select>
                </div>
            </div>
            <template x-for="quiz in filteredQuizzes" :key="quiz.id">
                <div class="grid grid-cols-1 gap-4 m-4">
                    <div class="flex flex-col h-full p-6 bg-gray-200 rounded-lg shadow-md hover:shadow-xl">
                        <h2 class="mb-2 text-xl font-semibold" x-text="quiz.title + ' '">
                            <span class="px-2 text-sm rounded-full bg-secondary w-fit" x-text="quiz.visibility"></span>
                        </h2>
                        <span class="mb-4 text-gray-600" x-text="'Type: ' + quiz.type.charAt(0).toUpperCase() + quiz.type.slice(1)"></span>
                        <span class="mb-4 text-gray-600" x-text="'Created on: ' + quiz.created_at"></span>
                        <p class="mb-4 text-sm text-gray-600" x-text="quiz.description"></p>
                    </div>
                </div>
            </template>

            <div x-show="quizzes.length === 0" class="flex items-center justify-center w-full h-full bg-gray-100 min-h-[50vh]">
                <p class="text-gray-500">No quiz history available.</p>
            </div>

        </div>

        {{-- @forelse($quizzes as $quiz)
            <div class="grid grid-cols-1 gap-4 m-4">
                <div class="flex flex-col h-full p-6 bg-gray-200 rounded-lg shadow-md hover:shadow-xl"> <!-- Changed background color -->
                    <h2 class="mb-2 text-xl font-semibold">{{ $quiz->title }} <span class="px-2 text-sm rounded-full bg-secondary w-fit"> {{ $quiz->visibility }}</span> </h2> <!-- Adjusted font size -->
                    <span class="mb-4 text-gray-600">Type: {{ ucfirst($quiz->type) }}</span>
                    <span class="mb-4 text-gray-600">Created on: {{ $quiz->created_at->format('d M, Y') }}</span>
                    <p class="mb-4 text-sm text-gray-600">{{ $quiz->description }}</p> <!-- Adjusted font size -->
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center w-full h-full bg-gray-100 min-h-[50vh]">
                <p class="text-gray-500">No quiz history available.</p>
            </div>
        @endforelse --}}
    </div>

</x-user-layout>

