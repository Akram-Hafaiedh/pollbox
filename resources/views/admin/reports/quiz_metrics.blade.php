<x-app-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Metrics')">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-blue-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">Total Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['totalQuizzes'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-green-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">Active Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['activeQuizzes'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-indigo-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">Completed Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['completedQuizzes'] }}</div>
                    </div>
                </div>
            </div>
        </x-dashboard-main-content>
    </div>
</x-app-layout>
