<x-admin-layout>


    <div class="flex flex-col md:flex-row" x-data="{ show: false }">

        @auth
            <x-dashboard-main-content :page-title="__('Quiz details')">
                {{-- <h3 class="mb-4 text-2xl font-semibold">Top 3 Quizzes</h3 --}}
                <div class="grid w-full grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Number of Questions -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Number of Questions</div>
                        <div class="text-3xl font-bold">{{ count($quiz->questions) }}</div>
                    </div>
                    <!-- Number of Responses -->
                    <div
                        class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Number of Responses</div>
                        <div class="text-3xl font-bold">20</div>
                    </div>
                    <!-- Finished Responses -->
                    <div
                        class="p-5 text-white rounded-lg shadow bg-gradient-to-r from-primary-dark/80 via-70% via-secondary to-secondary">
                        <div class="text-sm font-bold uppercase">Finished Responses</div>
                        <div class="text-3xl font-bold">15</div>
                    </div>
                    <!-- Other metrics can be added here -->
                    <div class="p-5 text-white rounded-lg shadow bg-gradient-to-r to-primary from-primary-dark">
                        <div class="text-sm font-bold uppercase">Unfinished Responses</div>
                        <div class="text-3xl font-bold">0</div>
                    </div>
                    <!-- Finished Responses -->
                    <div
                        class="p-5 text-white rounded-lg shadow bg-gradient-to-r via-primary/90 via-80% to-primary-dark/80 to-95% from-primary">
                        <div class="text-sm font-bold uppercase">Number of participants</div>
                        <div class="text-3xl font-bold">10</div>
                    </div>
                </div>

                <div class="mx-auto my-8">
                    <h1 class="text-3xl font-bold">Quiz Information</h1>
                    <div
                        class="relative p-6 text-white rounded-lg shadow-md bg-gradient-to-r from-primary-dark via-primary to-secondary">
                        <h2 class="mb-2 text-xl font-bold">{{ $quiz->title }}</h2>
                        <p class="text-gray-200"><span class="font-bold">Description : </span>{{ $quiz->description }}</p>
                        <p class="mt-4"><span class="font-bold">Created By: </span>{{ $quiz->admin->name }},
                            {{ $quiz->created_at->diffForHumans() }}</p>
                        <p><span class="font-bold">Start Date:
                            </span>{{ Carbon\Carbon::parse($quiz->start_date)->isoFormat('D MMM, YYYY') }}</p>
                        <p><span class="font-bold">End Date:
                            </span>{{ Carbon\Carbon::parse($quiz->end)->isoFormat('D MMM, YYYY') }}</p>
                        <p><span class="font-bold">Type: </span>{{ $quiz->type }}</p>
                        <p><span class="font-bold">Language:
                            </span>{{ $quiz->language === 'en' ? 'English' : ($quiz->language === 'ar' ? 'Arabic' : 'French') }}
                        </p>
                        <p><span class="font-bold">Visibility: </span>{{ ucfirst($quiz->visibility) }}</p>

                        <p class="flex items-center"><span class="font-bold">Text-Color :</span>
                            <span style="background-color: {{ $quiz->text_color }};"
                                class="inline-block w-5 h-5 ml-2 border border-gray-900 rounded-full"></span>
                        </p>


                        <p class="flex items-center"> <span class="font-bold">Background Color:</span>
                            <span style="background-color: {{ $quiz->bg_color }};"
                                class="inline-block w-5 h-5 ml-2 border border-gray-900 rounded-full"></span>
                        </p>
                        <div class="absolute bottom-0 right-0 flex items-center p-4 space-x-2">
                            <a href="{{ route('admin.quizzes.edit', $quiz) }}"
                                class="px-4 py-2 text-black bg-white rounded">Edit</a>
                            <button type="button" @click="show = !show" class="px-4 py-2 text-black bg-white rounded">
                                <span x-text="show ? 'Hide' : 'Show'">Show</span> Quiz Questions
                        </div>
                    </div>



                    <div x-show="show" class="my-4">
                        <!-- Your quiz questions here -->
                        @foreach ($quiz->questions as $index => $question)
                            <div class="p-4 mt-4 bg-gray-100 rounded-md">
                                <h3 class="text-lg font-bold"> Q{{ $index + 1 }} : {{ $question->content }}</h3>
                                <p><span class="font-bold">Type: </span>{{ $question->type }}</p>
                                <p><span class="font-bold">Required: </span>{{ $question->required ? 'True' : 'False' }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="my-8">
                        <h1 class="text-3xl font-bold">Users Participations</h1>
                        <div class="grid gap-4 mx-auto md:grid-cols-4 gird-cols-1">
                            @forelse ($users as $user)

                            <div class="flex flex-col items-center py-4 bg-gray-100 rounded-md">
                                <img src="{{ $user->avatar_url ? $user->avatar_url : asset('images/avatar.png') }}" alt="{{ $user->name }}'s avatar" class="rounded-full h-14 w-14">
                                <div class="flex items-center space-x-2">
                                    <h2 class="mb-2 text-xl font-bold">{{ $user->name }}</h2>
                                </div>

                                <p class="text-gray-800"><span class="font-bold">Email: </span>{{ $user->email }}</p>
                                <p class="mt-4"><span class="font-bold">Joined: </span>{{ $user->created_at->diffForHumans() }}</p>

                            </div>
                            @empty
                        </div>
                            <div class="bg-gray-100 min-h-[20vh] w-full flex items-center justify-center">
                                <p>No users found</p>
                            </div>
                        @endforelse
                    </div>



            </x-dashboard-main-content>
        @endauth

    </div>
</x-admin-layout>
