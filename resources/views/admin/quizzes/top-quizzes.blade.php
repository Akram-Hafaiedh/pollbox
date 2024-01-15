<x-app-layout>


    <div class="flex flex-col md:flex-row">


        @auth
            <x-dashboard-main-content :page-title="__('Top Quizzes')">
                <h3 class="mb-4 text-2xl font-semibold">Top 3 Quizzes</h3>
                <ul>

                </ul>
            </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
