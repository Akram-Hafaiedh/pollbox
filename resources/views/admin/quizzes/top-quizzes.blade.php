<x-app-layout>


    <div class="flex flex-col md:flex-row">


        @auth
        <x-dashboard-main-content :page-title="__('Top Quizzes')">
            <h3 class="mb-4 text-2xl font-semibold">Top 3 Quizzes</h3>
            <ul>
                @foreach ($topQuizzes as $quiz)
                <li class="mb-6">
                    <h4 class="mb-2 text-lg font-semibold">{{ $quiz->tile }} - {{ $quiz->score }} %</h4>
                    <p class="mb-2 text-sm font-medium">{{ $quiz->description }}</p>
                    {{-- <p class="mb-2 text-sm font-medium">{{ $quiz->score }} %</p> --}}
                    <p class="mb-2 text-sm font-medium">{{ $quiz->time_limit }} mins</p>
                </li>
                @endforeach
            </ul>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
