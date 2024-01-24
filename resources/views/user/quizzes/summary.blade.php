<x-app-layout>
    <div class="container mx-auto my-8 max-w-7xl" x-data="{open : true}">
        <h1 class="mb-4 text-3xl font-semibold">Thank You!</h1>
        <p class="mb-4 text-xl font-semibold">You've successfully completed the quiz: {{ $quiz->title }}</p>
        <p class="mb-4">Remember, the more you learn, the more you realize how much you don't know. Keep going!</p>
        <span class="">Quiz Taken At : {{ $quiz->created_at }}</span>

        @if(session('success'))
        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="success">
            <strong class="font-bold">Success</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
    </div>
</x-app-layout>

