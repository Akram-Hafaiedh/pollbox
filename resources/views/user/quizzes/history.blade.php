<x-user-layout>

    <div class="container mx-auto my-8" x-data>
    <div>
        <div class="flex justify-between mx-8 mb-4">
            <h1 class="mb-6 text-3xl font-bold">Quizzes History</h1>
            <div x-data>
                <form id="quiz-form" action="{{ route('user.quizzes.history.filter') }}" method="post">
                    @csrf
                    <label for="quiz-status" class="mr-2 text-gray-600">Filter by Status:</label>
                    <select id="quiz-select" name="quiz-state" class="p-2 pr-8 border rounded-md" x-data x-on:change="$refs.quizForm.submit()">
                        <option value="all"  {{ $state === 'all' ? 'selected' : '' }}>All</option>
                        <option value="completed" {{ $state === 'completed' ? 'selected' : '' }} >Finished</option>
                        <option value="in_progress" {{ $state === 'in_progress' ? 'selected' : '' }} >Unfinished</option>
                    </select>
                </form>
            </div>
        </div>

        @forelse($quizzes as $key => $quiz)
            <div class="grid grid-cols-1 gap-4 m-4">
                <div class="flex flex-col h-full p-6 bg-gray-200 rounded-lg shadow-md hover:shadow-xl">
                    <h2 class="mb-2 text-xl font-semibold"><span>{{ $quiz->title }}</span>
                        <span class="px-2 text-sm rounded-full bg-secondary w-fit">{{ $quiz->visibility }}</span>
                    </h2>
                    <span class="mb-4 text-gray-600">Type: {{ ucfirst( $quiz->type )}}</span>
                    <span class="mb-4 text-gray-600">Created On : {{ $quiz->created_at }} </span>
                    <p class="mb-4 text-sm text-gray-600">{{ $quiz->description }}</p>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center w-full h-full bg-gray-100 min-h-[50vh]">
                <p class="text-gray-500">No quiz history available.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    document.getElementById('quiz-select').addEventListener('change', function() {
        document.getElementById('quiz-form').submit();
    });
</script>


        {{-- @foreach($quizzes as $quiz)
            <p>Quiz State: {{ $quiz->userquizstates[0]->state }}</p>
        @endforeach --}}

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

