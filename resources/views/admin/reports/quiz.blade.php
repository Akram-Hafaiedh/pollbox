<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Report Detail')">
            {{-- <h1 class="text-3xl font-bold text-center">Survey Report</h1> --}}

            <p class="mb-2 text-base font-semibold text-green-500">Total Questions: {{ $statistics['total_questions'] }}</p>
            <p class="mb-2 text-base font-semibold text-green-500">Total Responses: {{ $statistics['total_responses'] }}</p>
            <p class="mb-2 text-base font-semibold text-green-500">Total Completion Rate: {{ (int) $statistics['total_completion_rate'] }}%</p>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercaset text-start">
                            Name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercaset text-start">
                            State
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($statistics['participants'] as $participant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ substr($participant['user']->name, 0, 2) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ substr($participant['user']->name, 0, 2) }}
                                    </div>
                                </div>
                            </div>
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
                    @endforeach
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
                            @foreach ($responses as $response)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $response }}</td>
                                </tr>
                            @endforeach
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
