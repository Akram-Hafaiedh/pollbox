<!-- resources/views/user/history.blade.php -->

<x-app-layout>

    <div class="container mx-auto my-8">
        <h1 class="mb-4 text-3xl font-semibold">{{ $user->name }}'s Quiz History</h1>

        @if ($quizzes->count() > 0)
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($quizzes as $quiz)
            <div class="flex flex-col h-full p-4 bg-gray-200 border-transparent rounded-md hover:border-black border-1">
                <h2 class="mb-2 text-xl font-semibold">{{ $quiz->title }}</h2>
                <p class="mb-4 text-gray-600">{{ $quiz->description }}</p>
                {{-- Add more details as needed --}}
                <a href="{{ route('user.quizzes.results', $quiz) }}"
                    class="p-2 mt-auto ml-auto text-white bg-blue-500 rounded-lg hover:underline w-fit">View
                    Results</a>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-500">No quiz history available.</p>
        @endif
    </div>

</x-app-layout>