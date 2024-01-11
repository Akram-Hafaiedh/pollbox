<x-app-layout>
   <x-dashboard-main-content :page-title="__('Home')">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white ">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-6 text-2xl font-semibold">Latest Quizzes</h2>

                <div class="space-y-4">
                    @forelse ($latestQuizzes as $quiz)
                        <div class="p-4 transition duration-300 ease-in-out rounded shadow-md hover:shadow-lg">
                            <a href="{{ route('user.quizzes.show', $quiz->id) }}" class="text-lg text-blue-600 hover:text-blue-800">{{ $quiz->title }}</a>
                            <div class="mt-1 text-sm text-gray-600">Published on: {{ $quiz->created_at->format('M d, Y') }}</div>
                        </div>
                    @empty
                        <p>No quizzes available.</p>
                    @endforelse
                </div>

                <div class="mt-8">
                    <a href="{{ route('user.quizzes.index') }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-700">
                        View All Quizzes
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-main-content>




</x-app-layout>
