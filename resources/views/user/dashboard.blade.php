<x-app-layout>
   <x-dashboard-main-content :page-title="__('Acceuil')">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-6 text-2xl font-semibold">Latest Quizzes</h2>

                    <div class="grid justify-start grid-cols-1 gap-4 md:grid-cols-2">
                        @forelse ($latestQuizzes as $quiz)
                            <div class="p-6 duration-300 ease-in-out bg-white border-2 rounded-lg shadow-md ransition hover:shadow-xl min-w-64">
                                <a href="{{ route('user.quizzes.show', $quiz->id) }}" class="text-lg text-primary-dark/80 hover:text-primary">{{ $quiz->title }}</a>
                                <div class="mt-2 text-sm">
                                    <span class="text-gray-600">Questions: {{ $quiz->questions->count() }}</span>
                                </div>
                                <div class="mt-2 text-sm text-gray-600">
                                    Published on: {{ $quiz->created_at->format('M d, Y') }}
                                </div>
                            </div>
                        @empty
                            <p>No quizzes available.</p>
                        @endforelse
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('user.quizzes.index') }}" class="px-4 py-2 font-semibold text-white bg-[#064b7a] rounded hover:bg-[#032d49]">
                            View All Quizzes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-main-content>
</x-app-layout>
