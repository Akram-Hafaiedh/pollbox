<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="flex flex-col md:flex-row">

        @auth
        <x-dashboard-main-content :page-title="__('Quiz details')">
            {{-- <h3 class="mb-4 text-2xl font-semibold">Top 3 Quizzes</h3 --}} <div class="container mx-auto ">
            <!-- Quiz Actions -->
            <div class="flex items-center space-x-2 mb-4">
                <a href="{{ route('admin.quizzes.edit', $quiz) }}"
                    class="text-white inline-flex items-center px-4 py-2 tracking-widest  transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md  hover:bg-indigo-700  focus:bg-indigo-700  active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2">Edit</a>
                {{-- TODO : CREATE THE MODAL FOR DELETING A QUIZ --}}
                <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white inline-flex items-center px-4 py-2 tracking-widest  transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md  hover:bg-blue-700  focus:bg-blue-500 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2"
                        onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                </form>
            </div>
            <div class="bg-gray-200 shadow-md rounded px-8 py-6">

                <div class="flex flex-row">

                    <div>
                        <!-- Quiz Details  -->
                        <h1 class="text-3xl font-bold mb-4">{{ $quiz->title }}</h1>
                        <p class="text-gray-600 mb-6">{{ $quiz->description }}</p>
                        <p class="text-sm text-gray-500">Created at: {{ $quiz->created_at->format('Y-m-d H:i:s') }}</p>
                        <p class="text-sm text-gray-700">Time Limit: {{ $quiz->time_limit }} minutes</p>
                        <p class="text-sm text-gray-700">Score: {{ $quiz->score }}</p>

                        @isset( $quiz->selectedUsers->first()->pivot->code)
                        <p class="text-sm text-gray-700">Code : {{ $quiz->selectedUsers->first()->pivot->code }}</p>
                        @endisset
                        <p class="{{ $quiz->active ? 'text-green-500 font-bold' : 'text-red-500' }}">
                            {{ $quiz->active ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-row space-x-2 mt-8 my-2 w-full">
                    <!-- Quiz questions -->
                    <div class="w-full">
                        <div
                            class="flex items-center justify-between px-6 py-5 pb-1 font-semibold border-b border-gray-100">
                            <span>Questions</span>
                        </div>
                        {{-- <h2 class="text-xl font-bold mb-4">Questions</h2> --}}

                        <div class="overflow-y-auto max-h-[24rem] bg-gray-50/80 p-4 my-2">
                            @foreach ($quiz->questions as $question)
                            <div class="mb-4">
                                <p class="text-lg font-semibold">{{ $question->content }}</p>

                                <ul class="list-disc ml-6 flex flex-col space-y-4">

                                    @foreach ($question->options as $option)

                                    <li
                                        class="{{ $option->is_correct ? 'bg-blue-300 font-bold' : 'bg-gray-300' }} rounded p-2">
                                        {{ $option->content }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!--Users related to the quiz-->
                    <div class="w-96">
                        <div
                            class="flex items-center justify-between px-6 py-5 pb-1 font-semibold border-b border-gray-100">
                            <span>Clients</span>
                        </div>

                        <div class="overflow-y-auto max-h-[24rem]  bg-white rounded shadow-md my-2">
                            <ul class="p-6 space-y-2">

                                @foreach ( $users as $user)
                                <li class="flex items-center hover:bg-blue-200 rounded p-1">
                                    <div
                                        class="h-10 w-10 mr-3 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-sm">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                    <span class="text-gray-600">{{ $user->name }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>