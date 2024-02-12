<x-admin-layout>
    <h1>User Survey Report</h1>

    <p>Total Questions: {{ $statistics['total_questions'] }}</p>
    <p>User Responses: {{ $statistics['user_responses'] }}</p>
    <p>User Completion Rate: {{ $statistics['user_completion_rate'] }}%</p>

    <!-- Loop through user's responses -->
    @foreach ($user->responses as $response)
        <h3>Response for Question {{ $loop->iteration }}</h3>
        <p>Question: {{ $response->question->text }}</p>
        <p>User's Response: {{ $response->response }}</p>
        <!-- Add more details about each response as needed -->
    @endforeach
</x-admin-layout>
