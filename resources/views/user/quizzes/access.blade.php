<x-app-layout>
    <div class="container mx-auto my-8">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Quizz Access code') }}
            </h2>
        </x-slot>



        {{-- <p>{{ $quiz->title }}</p> --}}

        <!-- Add any other details you want to display -->

        <!-- Code Input Form -->
        <div class="flex items-center justify-center">

            <form action="{{ route('user.quizzes.show', $quiz) }}" method="post" >
                @csrf
                <label for="code" class="block text-sm font-medium text-gray-700">Enter 4-digit Code:</label>
                <input type="text" name="code" id="code" class="p-2 mt-1 border rounded-md" maxlength="4">
                <button type="submit" class="p-2 mt-2 text-white bg-blue-500 rounded-md">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
