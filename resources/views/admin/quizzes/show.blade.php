<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="flex flex-col md:flex-row">

        @auth
            <x-dashboard-main-content :page-title="__('Quiz details')">
                {{-- <h3 class="mb-4 text-2xl font-semibold">Top 3 Quizzes</h3 --}}
                <div class="grid w-full grid-cols-1 gap-4 my-2 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Number of Questions -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Number of Questions</div>
                        <div class="text-3xl font-bold">10</div>
                    </div>
                    <!-- Number of Responses -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Number of Responses</div>
                        <div class="text-3xl font-bold">20</div>
                    </div>
                    <!-- Finished Responses -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r from-primary-dark/80 via-70% via-secondary to-secondary">
                        <div class="text-sm font-bold uppercase">Finished Responses</div>
                        <div class="text-3xl font-bold">15</div>
                    </div>
                    <!-- Other metrics can be added here -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Unfinished Responses</div>
                        <div class="text-3xl font-bold">0</div>
                    </div>
                    <!-- Finished Responses -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Number of participantsg</div>
                        <div class="text-3xl font-bold">10</div>
                    </div>
                </div>

                    <div class="container mx-auto">
                    <!-- Quiz Actions -->
                    <div class="flex items-center mb-4 space-x-2">
                        <a href="{{ route('admin.quizzes.edit', $quiz) }}"
                            class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2">Edit</a>
                        {{-- TODO : CREATE THE MODAL FOR DELETING A QUIZ --}}
                        <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 focus:bg-blue-500 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2"
                                onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                        </form>
                    </div>
                    <div class="px-8 py-6 bg-gray-200 rounded shadow-md">

                        <div class="flex flex-row">

                            <div>
                                <!-- Quiz Details  -->
                                <h1 class="mb-4 text-3xl font-bold">{{ $quiz->title }}</h1>
                                <p class="mb-6 text-gray-600 ">Description :
                                    <span class="block mt-4">{{ $quiz->description }}</span>
                                </p>




                                <p class="text-sm text-gray-700">
                                    Période: Entre
                                    <span
                                        class="font-semibold">{{ Carbon\Carbon::parse($quiz->start_date)->isoFormat('MMM D, YYYY') }}</span>
                                    et
                                    <span
                                        class="font-semibold">{{ Carbon\Carbon::parse($quiz->end_date)->isoFormat('MMM D, YYYY') }}</span>
                                </p>

                                <p class="text-sm text-gray-500">Created : {{ $quiz->created_at->diffForHumans() }}</p>
                                <p class="flex items-center text-sm text-gray-700">Color :
                                    <span style="background-color: {{ $quiz->text_color }};"
                                        class="inline-block w-5 h-5 ml-2 border border-gray-900 rounded-full"></span>
                                </p>


                                <p class="flex items-center text-sm text-gray-700">Background :
                                    <span style="background-color: {{ $quiz->background_color }};"
                                        class="inline-block w-5 h-5 ml-2 border border-gray-900 rounded-full"></span>
                                </p>

                                <p class="text-sm text-gray-700">Questions: {{ count($quiz->questions) }}</p>

                            </div>
                        </div>
                        <div class="flex flex-col w-full my-2 mt-8 space-x-2 lg:flex-row">
                            <!-- Quiz questions -->
                            <div class="w-full">
                                <div
                                    class="flex items-center justify-between px-6 py-5 pb-1 font-semibold border-b border-gray-100">
                                    <span>Questions</span>
                                </div>
                                {{-- <h2 class="mb-4 text-xl font-bold">Questions</h2> --}}

                                <div class="overflow-y-auto max-h-[24rem] bg-gray-50/80 p-4 my-2">
                                    @foreach ($quiz->questions as $question)
                                        <div class="mb-4">
                                            <p class="text-lg font-semibold">{{ $question->content }}</p>
                                            {{-- Check if the question type is 'feedback' --}}
                                            @if ($question->type === 'feedback')
                                                <span class="text-indigo-500">(Feedback)</span>
                                            @endif
                                            @if ($question->image_path)
                                                <img class="h-auto mx-auto my-4 max-w-32"
                                                    src="{{ asset('storage/' . $question->image_path) }}"
                                                    alt="Question Image" class="w-32 h-auto">
                                            @endif
                                            @if ($question->video_url)
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe name="question-video-player"
                                                        class="max-w-md mx-auto embed-responsive-item "
                                                        src="{{ $question->video_url }}?controls=0&rel=0&fs=1"
                                                        allowfullscreen frameborder="0"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                                </div>
                                            @endif

                                            <ul class="flex flex-col ml-6 space-y-4 list-disc ">

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
                            @if ($quiz->visibility === 'restricted')
                                @php
                                    $users = $quiz->selectedUsers;
                                @endphp

                                <div class="w-full lg:w-1/3 min-w-64">
                                    <div
                                        class="flex items-center justify-between px-6 py-5 pb-1 font-semibold border-b border-gray-100">
                                        <span>{{ __('Users') }}</span>
                                    </div>

                                    <div class="overflow-y-auto max-h-[24rem] lg:h-full bg-white rounded shadow-md my-2">
                                        <ul class="p-6 space-y-2">

                                            @foreach ($users as $user)
                                                <li class="flex items-center p-1 rounded hover:bg-blue-200">
                                                    <div class="">
                                                        <div
                                                            class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                                                            {{ substr($user->name, 0, 2) }}
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-600">{{ $user->name }}</span>
                                                    @isset($user->pivot->pending)
                                                        <div class="ml-auto ">
                                                            @if ($user->pivot->pending)
                                                                <span class="px-2 py-1 text-white bg-red-500 rounded-full">
                                                                    {{ __('Pending') }}
                                                                </span>
                                                            @else
                                                                <span class="px-2 py-1 text-white bg-green-700 rounded-full">
                                                                    {{ __('Accepted') }} </span>
                                                            @endif
                                                        </div>
                                                    @endisset
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
            </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
