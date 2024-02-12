<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Reports')">
            {{-- <div class="p-4 bg-gray-100">
                <a href="{{ url()->previous() }}">Go Back</a>
            </div> --}}
            <ul class="flex flex-col space-y-2">
                @foreach ($quizzes as $quiz)
                    <li class="p-2 bg-gray-200 rounded-md hover:bg-gray-300">
                        <a href="{{ route('admin.reports.quiz', $quiz) }}"
                            class="w-full text-blue-500 hover:text-blue-700">{{ $quiz->title }}</a>
                    </li>
                @endforeach
            </ul>
            {{ $quizzes->links() }}

        </x-dashboard-main-content>
    </div>
</x-admin-layout>
