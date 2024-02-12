<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Reports Dashboard')">
            <ul class="p-4 pl-5 space-y-4 list-disc bg-gray-100">

                <li class="text-blue-500 hover:underline"><a href="{{ route('admin.reports.quizzes') }}">Quiz Metrics</a>
                </li>
                <li class="text-blue-500 hover:underline"><a href="{{ route('admin.reports.user_metrics') }}">User
                        Metrics</a></li>
                <li class="text-blue-500 hover:underline"><a
                        href="{{ route('admin.reports.participation_metrics') }}">Participation Metrics</a></li>
                <li class="text-blue-500 hover:underline"><a href="{{ route('admin.reports.question_metrics') }}">Question
                        Metrics</a></li>
                <li class="text-blue-500 hover:underline"><a
                        href="{{ route('admin.reports.quiz_participation_metrics') }}">Quiz Participation Metrics</a>
                </li>
                <li class="text-blue-500 hover:underline"><a
                        href="{{ route('admin.reports.user_participation_metrics') }}">User Participation Metrics</a>
                </li>
                <li class="text-blue-500 hover:underline"><a
                        href="{{ route('admin.reports.question_participation_metrics') }}">Question Participation
                        Metrics</a></li>
            </ul>
        </x-dashboard-main-content>
    </div>
</x-admin-layout>
