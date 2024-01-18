<x-app-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Metrics')">
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
                                    <div @click="showQuestions = !showQuestions" class="px-4 cursor-pointer">
                                        {{ $quiz->title }}
                                    </div>
                                    <div x-show="showQuestions" class="px-4 mt-2">
                                        <ul class="">
                                            @foreach ($quiz->questions as $index => $question)
                                                @dump($question->responses)
                                                <li class="px-2 py-2 text-white bg-primary">
                                                    Q{{ $index + 1 }}: {{ $question->content }}
                                                    @if ($question->type == 'likert_scale')
                                                        <span>({{ __('Échelle de Likert') }})</span>
                                                    @elseif($question->type == 'multiple_choice')
                                                        <span>({{ __('Choix multiple') }})</span>
                                                    @elseif($question->type == 'single_choice')
                                                        <span>({{ __('Choix unique') }})</span>
                                                    @elseif($question->type == 'ranking')
                                                        <span>({{ __('Classement') }})</span>
                                                    @elseif($question->type == 'feedback')
                                                        <span>({{ __('Feedback') }})</span>
                                                    @endif
                                                </li>
                                                <div class="flex flex-col justify-around w-full ">
                                                    <table class="w-full table-auto ">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="w-1/2 px-3 py-2 text-left border border-gray-300">
                                                                    Option</th>
                                                                <th
                                                                    class="w-1/2 px-3 py-2 text-right border border-gray-300">
                                                                    Pourcentage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($question->options as $option)
                                                                <tr>
                                                                    <td
                                                                        class="px-3 py-2 text-left border border-gray-300">
                                                                        {{ $option->content }}
                                                                    </td>
                                                                    <td
                                                                        class="px-3 py-2 text-right border border-gray-300">
                                                                        0%
                                                                    </td>
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
