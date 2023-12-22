<x-app-layout>

    <div class="container mx-auto my-8">
        <h1 class="mb-4 text-3xl font-semibold">{{ $user->name }}'s Quizzes</h1>

        @if ($quizzes->count() > 0)
            <ul class="pl-4 list-disc">
                @foreach ($quizzes as $quiz)
                    <li class="text-blue-500 hover:underline">
                        <a href="{{ route('user.quizzes.show', [$quiz,$user]) }}">{{ $quiz->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No quizzes found for {{ $user->name }}.</p>
        @endif
    </div>
</x-app-layout>
