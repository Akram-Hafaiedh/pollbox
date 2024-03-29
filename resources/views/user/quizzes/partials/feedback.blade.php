@if ($question->type === 'feedback')
    <div class="mt-4">

        @php
            // Retrieve the user's response for this feedback question
            $feedbackResponse = $userResponses->where('question_id', $question->id)->first();

        @endphp
        <div class="mt-1">
            <!-- Display the user's feedback response -->
            <textarea class="block w-full mt-1 border rounded-md shadow-sm border-secondary focus:ring-primary focus:border-indigo-500 sm:text-sm" readonly>{{ $feedbackResponse->answer ?? 'No response provided' }}</textarea>
        </div>
    </div>
@endif
