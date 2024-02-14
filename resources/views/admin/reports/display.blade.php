<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Reports')">
            <form method="GET">
                @csrf
                <div class="flex flex-row justify-between mb-3">
                    <div class="w-1/4">
                        <x-input-label for="start_date_filter" :value="__('Filter by Start Date')" />
                        <x-text-input id="start_date_filter" class="block w-full mt-1 text-sm" type="date" name="start_date_filter" :value="old('start_date_filter')" autofocus />
                    </div>
                    <div class="w-1/4">
                        <x-input-label for="end_date_filter" :value="__('Filter by End Date')" />
                        <x-text-input id="end_date_filter" class="block w-full mt-1 text-sm" type="date" name="end_date_filter" :value="old('end_date_filter')" autofocus />
                    </div>
                    <div class="w-1/4">
                        <x-input-label for="title_filter" :value="__('Filter by Quiz Title')" />
                        <x-text-input id="title_filter" class="block w-full mt-1 text-sm" type="text" name="title_filter" :value="old('title_filter')" autofocus />
                        <button type="submit" class="w-full py-2 mt-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-700">Filter</button>
                    </div>
                </div>
            </form>
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
