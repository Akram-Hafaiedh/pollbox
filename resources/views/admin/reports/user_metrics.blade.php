<x-app-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Metrics')">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-purple-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">Total Users</div>
                        <div class="text-3xl font-bold">{{ $userMetrics['totalUsers'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-yellow-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">Active Users</div>
                        <div class="text-3xl font-bold">{{ $userMetrics['activeUsers'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white bg-red-500 rounded-lg shadow">
                        <div class="text-sm font-bold uppercase">New Users</div>
                        <div class="text-3xl font-bold">{{ $userMetrics['newUsers'] }}</div>
                    </div>
                </div>
            </div>
        </x-dashboard-main-content>
    </div>
</x-app-layout>
