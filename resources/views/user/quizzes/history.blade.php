<!-- resources/views/user/history.blade.php -->

<x-app-layout>

    <x-dashboard-main-content :page-title="__('Quiz History')">
    <div class="container mx-auto my-8">
        @forelse($quizzes as $quiz)
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="flex flex-col h-full p-4 bg-gray-200 border-transparent rounded-md hover:border-black border-1">
                    <h2 class="mb-2 text-xl font-semibold">{{ $quiz->title }} <span class="px-2 text-sm rounded-full bg-secondary w-fit"> {{ $quiz->visibility }}</span> </h2>
                    <p>N° of questions : <span>({{ $quiz->questions->count() }} questions)</span></p>
                    <span class="mb-4 text-gray-600">Category: {{ isset($quiz->category->name) ? $quiz->category->name : 'N/A' }}</span>
                    <div class="flex divide-x divide-primary">
                        <p class="mr-4">Start: {{ $quiz->start_date}}</p>
                        <p class="pl-4">End: {{ $quiz->end_date}}</p>
                    </div>
                    <p>Created on: {{ $quiz->created_at->format('M d, Y') }}</p>
                    <p class="mb-4 text-gray-600">{{ $quiz->description }}</p>
                    {{-- Add more details as needed --}}
                    <a href="{{ route('user.quizzes.results', $quiz) }}"
                        class="p-2 mt-auto text-center uppercase text-sm ml-auto text-white bg-[#064b7a] rounded w-full hover:bg-[#032d49]">View
                        Results
                    </a>
                </div>
            </div>
        @empty
            <div class="grid items-center justify-center w-full h-full bg-gray-100 min-h-[50vh]">
                <p class="text-gray-500">No quiz history available.</p>
            </div>
        @endforelse
    </div>
    </x-dashboard-main-content>

</x-app-layout>
