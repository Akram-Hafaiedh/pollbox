<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Report Detail')">
            <h1>Survey Report</h1>

            <p>Total Questions: {{ $statistics['total_questions'] }}</p>
            <p>Total Responses: {{ $statistics['total_responses'] }}</p>
            <p>Total Completion Rate: {{ (int) $statistics['total_completion_rate'] }}%</p>
            <p>Participants:</p>
            <ul>
                @foreach ($statistics['participants'] as $participant)
                    <li>{{ $participant['user']->name }} - {{ $participant['userQuizState']->state }}</li>
                @endforeach
            </ul>

            @if ($user)
                <p>User Completion Rate: {{ $statistics['user_completion_rate'] }}%</p>
            @endif

            @php
                $chartCounter = 0;
            @endphp
            <!-- Loop through survey questions -->
            @foreach ($quiz->questions as $question)
                <h3>Question {{ $loop->iteration }}: ({{ $question->type }})</h3>
                <p>{{ $question->content }}</p>
                <!-- Add more details about each question as needed -->
                <canvas id="quizChart{{ $chartCounter }}" class="aspect-square max-h-[40vh]" width="400"
                    height="400"></canvas>
                @php
                    $chartCounter++;
                @endphp
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
