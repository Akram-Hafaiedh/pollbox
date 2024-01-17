<x-app-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Metrics')">
            {{-- <div class="flex flex-wrap -mx-2">
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Total Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['totalQuizzes'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Active Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['activeQuizzes'] }}</div>
                    </div>
                </div>
                <div class="w-full px-2 mb-4 sm:w-1/2 lg:w-1/3">
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r from-primary-dark/80 via-70% via-secondary to-secondary">
                        <div class="text-sm font-bold uppercase">Completed Quizzes</div>
                        <div class="text-3xl font-bold">{{ $quizMetrics['completedQuizzes'] }}</div>
                    </div>
                </div>
            </div> --}}
            <div class="min-h-[50vh]">
                <table class="w-full text-black table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr x-data="{ showQuestions: false }" class="hover:bg-gray-100">
                                <td class="py-2 border ">
                                    <div @click="showQuestions = !showQuestions" class="px-4 cursor-pointer">{{ $quiz->title }}</div>
                                    <div x-show="showQuestions" class="px-4 mt-2">
                                        <ul class="">
                                            @foreach ($quiz->questions as $index => $question)
                                                <li class="px-2 py-2 text-white bg-primary">Q{{ $index+1 }}: {{ $question->content }}</li>
                                                <div class="flex flex-col justify-around w-full ">
                                                    <table class="block w-full min-w-[640px] table-auto">
                                                        <thead>
                                                            <tr class="w-full">
                                                                <th class="w-1/2">Option</th>
                                                                <th class="w-1/2">Pourcentage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($question->options as $option)

                                                                <tr>
                                                                    <td class="text-center">{{ $option->content }}</td>
                                                                    <td class="ml-auto text-center">0%</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-2 my-2">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </x-dashboard-main-content>
    </div>
</x-app-layout>
