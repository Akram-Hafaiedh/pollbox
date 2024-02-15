<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Report Detail')">
            {{-- <h1 class="text-3xl font-bold text-center">Survey Report</h1> --}}

            <div class="flex justify-between mb-4">
                    {{-- <h1 class="mb-2 text-3xl font-bold text-center">Survey Report</h1> --}}
                    <div class="mb-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Quiz Name : {{ $quiz->title }}</h2>
                        <p class="max-w-4xl mt-2 text-lg text-gray-600">Quiz Description: {{ $quiz->description }}</p>
                    </div>

                        <a href="{{ route('admin.reports.export.pdf', $quiz) }}"
                            class="h-10 px-4 py-2 text-sm font-bold text-white rounded bg-primary hover:bg-blue-700">
                            <i class="inline-block w-4 h-4 mr-1 fa-regular fa-file-pdf"></i>
                            Export PDF
                        </a>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    {{-- <p class="mb-2 text-base font-semibold text-green-500">Total Participants: {{ $statistics['total_participants'] }}</p> --}}
                    <p class="mb-2 text-base font-semibold text-green-500">Total Questions: {{ $statistics['total_questions'] }}</p>
                    <p class="mb-2 text-base font-semibold text-green-500">Total Responses: {{ $statistics['total_responses'] }}</p>
                    <p class="mb-2 text-base font-semibold text-green-500">Total Completion Rate: {{ (int) $statistics['total_completion_rate'] }}%</p>
                </div>
            <table class="min-w-full border border-gray-400 divide-y divide-gray-200 border-1">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-start">
                            User Logo
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercaset text-start">
                            Name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercaset text-start">
                            State
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($statistics['participants'] as $participant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full">
                                <span class="text-sm font-medium text-gray-900">
                                    {{ collect(explode(' ', $participant['user']->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->join('') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">{{ $participant['user']->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $state = $participant['userQuizState']->state;
                                $color = '';
                                switch($state) {
                                    case 'in-progress':
                                        $color = 'bg-yellow-200 text-yellow-500';
                                        break;
                                    case 'completed':
                                        $color = 'bg-green-200 text-green-500';
                                        break;
                                    case 'not_started':
                                        $color = 'bg-orange-200 text-orange-500';
                                        break;
                                }
                            @endphp
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full {{ $color }}">
                                {{ $state }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-sm text-center text-gray-400">No data to be displayed yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @php
                $chartCounter = 0;
            @endphp
            <!-- Loop through survey questions -->
            @foreach ($quiz->questions as $question)
                <h3>Question {{ $loop->iteration }}: ({{ $question->type }})</h3>
                <p>{{ $question->content }}</p>
                @if ($question->type !== 'feedback')
                    <canvas id="quizChart{{ $chartCounter }}" class="aspect-square max-h-[40vh]" width="400"
                        height="400"></canvas>
                    @php
                        $chartCounter++;
                    @endphp
                @else
                    @php
                        $responses = $question->responses->pluck('answer')->toArray();
                    @endphp
                    <table class="min-w-full border border-gray-400 divide-y divide-gray-200 border-1">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Feedbacks: {{ $question->res }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($responses as $response)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $response }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="py-4 text-center text-gray-500">No answers to be displayed yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif
            @endforeach

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var charts = @json($charts);

                    charts.forEach(function(chartData, index) {
                        var ctx = document.getElementById('quizChart' + index).getContext('2d');
                        console.log('chartData: ', chartData);
                        var quizChart = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                });
            </script>
        </x-dashboard-main-content>
    </div>
</x-admin-layout>
