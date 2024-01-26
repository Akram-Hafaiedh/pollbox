<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Metrics')">
            <div class="min-h-[50vh]">
                <form method="GET">
                    @csrf
                    <div class="flex flex-row justify-between mb-3">
                        <div class="w-1/4">
                            <x-input-label for="start_date_filter" :value="__('Filter by Start Date')" />
                            <x-text-input id="start_date_filter" class="block w-full mt-1 text-sm" type="date" name="start_date_filter" :value="old('start_date_filter')" autofocus />
                        </div>
                        <div class="w-1/4">
                            <x-input-label for="end_date_filter" :value="__('Filter by End Date')" />
                            <x-text-input id="end_date_filter" class="block w-full mt-1 text-sm" type="date" name="end_date_filter" :value="old('end_date_filter')" autofocus />
                        </div>
                        <div class="w-1/4">
                            <x-input-label for="title_filter" :value="__('Filter by Quiz Title')" />
                            <x-text-input id="title_filter" class="block w-full mt-1 text-sm" type="text" name="title_filter" :value="old('title_filter')" autofocus />
                            <button type="submit" class="w-full py-2 mt-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-700">Filter</button>
                        </div>
                    </div>
                </form>
                <table class="w-full text-black table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($quizzes as $quiz)
                            <div class="flex flex-row">
                            </div>
                            <tr x-data="{ showQuestions: false }" class="hover:bg-gray-100">
                                <td class="py-2 border ">
                                    <div @click="showQuestions = !showQuestions" class="px-4 cursor-pointer">
                                        {{ $quiz->title }}
                                    </div>
                                    <div x-show="showQuestions" class="px-4 mt-2">
                                        <ul class="">
                                            @foreach ($quiz->questions as $index => $question)

                                            @php
                                            $maxRank = count($question->options);
                                            @endphp
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
                                                                @if($question->type == 'feedback')
                                                                    <th class="w-full px-3 py-2 text-left border border-gray-300">
                                                                        Réponses
                                                                    </th>

                                                                @elseif ($question->type == 'ranking')
                                                                    <th class="w-1/2 px-3 py-2 text-left border border-gray-300">
                                                                        Option
                                                                    </th>
                                                                    <th class="w-1/2 px-3 py-2 text-center border border-gray-300">
                                                                        Ranks
                                                                    </th>
                                                                @else
                                                                    <th class="w-1/2 px-3 py-2 text-left border border-gray-300">
                                                                        Option
                                                                    </th>
                                                                    <th class="w-1/2 px-3 py-2 text-right border border-gray-300">
                                                                        Pourcentage
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        @if($question->type == 'feedback' || $question->type == 'ranking')
                                                            <!-- Add your feedback and ranking related logic here -->
                                                            @if($question->type == 'ranking')
                                                                <tbody>
                                                                    @forelse($question->options as $option)
                                                                        <tr>
                                                                            <td class="px-3 py-2 text-left border border-gray-300">
                                                                                {{ $option->content }}
                                                                            </td>
                                                                            <td class="w-full">
                                                                                <table class="w-full table-fixed">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            @foreach(range(1,$maxRank) as $number)
                                                                                                <th class="w-1/2 py-2 text-sm text-center border text-nowrap">Rank {{ $number  }}</th>
                                                                                            @endforeach
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>

                                                                                            @forelse(range(1,$maxRank) as $rank)
                                                                                                @php
                                                                                                $responsesInRank = $question->responses()
                                                                                                    //->where('ranking', $rank )
                                                                                                    ->where('option_id', $option->id)
                                                                                                    ->get();
                                                                                                @endphp
                                                                                                {{-- @dump($rank , $responsesInRank) --}}
                                                                                                <td class="py-2 text-center border">0</td>
                                                                                            @empty
                                                                                                <td colspan="{{ $maxRank }}" class="py-4 text-sm text-center text-gray-300">Pas de réponses ...</td>
                                                                                            @endforelse
                                                                                                @dump($responsesInRank)
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr><td>No options</td></tr>
                                                                    @endforelse
                                                                </tbody>
                                                            @else
                                                                <tbody>
                                                                    @forelse($question->responses as $response)
                                                                        <tr>
                                                                            <td class="px-3 py-2 text-left border border-gray-300">
                                                                                {{ $response->answer }}
                                                                            </td>
                                                                        <tr>
                                                                    @empty
                                                                        <tr>
                                                                                <td>No responses</td>
                                                                        </tr>
                                                                        @endforelse
                                                                </tbody>
                                                            @endif
                                                                <tbody>

                                                                </tbody>
                                                            @else
                                                                <tbody>
                                                                    @foreach ($question->options as $option)
                                                                        @php
                                                                            $totalResponses = count($question->responses);
                                                                            $optionResponses = $question->responses()->where('option_id', $option->id)->count();
                                                                            $percentage = $totalResponses > 0 ? $optionResponses / $totalResponses * 100 : 0;
                                                                        @endphp
                                                                        <tr>
                                                                            <td class="px-3 py-2 text-left border border-gray-300">
                                                                                {{ $option->content }}
                                                                            </td>
                                                                            <td class="px-3 py-2 text-right border border-gray-300">
                                                                                {{ round($percentage) }}%
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            @endif
                                                    </table>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="flex items-center justify-center min-h-[50vh] text-gray-300">
                                    <i class="mr-4 fas fa-scribd"></i>
                                    No quizzes found
                                </td>
                            </tr>
                        @endforelse ($quizzes as $quiz)
                    </tbody>
                </table>
                <div class="px-2 my-2">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </x-dashboard-main-content>
    </div>
</x-app-layout>
