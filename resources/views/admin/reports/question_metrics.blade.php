<x-app-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Question Metrics')">
            <div class="flex flex-wrap ">
                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Total Questions -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Total Questions</div>
                        <div class="text-3xl font-bold">{{ $questionMetrics['totalQuestions'] }}</div>
                    </div>
                    <!-- Average Questions Per Day -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Avg Questions/Day (Last 30 Days)</div>
                        <div class="text-3xl font-bold">{{ number_format($questionMetrics['averageQuestionsPerDay'], 2) }}</div>
                    </div>
                    <!-- New Questions This Month -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r from-primary-dark/80 via-70% via-secondary to-secondary">
                        <div class="text-sm font-bold uppercase">New Questions This Month</div>
                        <div class="text-3xl font-bold">{{ $questionMetrics['newQuestionsThisMonth'] }}</div>
                    </div>
                    <!-- Other metrics can be added here -->
                </div>

                <!-- Questions Per Type -->
                <div class="mt-10 min-h-[50vh]">
                    <h2 class="mb-4 text-xl font-semibold">Questions Per Type</h2>
                    <div class="flex flex-wrap -mx-2">
                        @foreach ($questionMetrics['questionsPerType'] as $type)
                            <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/3">
                                <div class="p-5 text-white bg-indigo-500 rounded-lg shadow">
                                    <div class="text-sm font-bold uppercase">{{ $type->type }}</div>
                                    <div class="text-3xl font-bold">{{ $type->total }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-dashboard-main-content>
    </div>
</x-app-layout>
