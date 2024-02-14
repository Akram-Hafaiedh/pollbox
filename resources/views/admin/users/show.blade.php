<x-admin-layout>

    <div class="flex flex-col md:flex-row">
        @auth
        <x-dashboard-main-content :page-title="  __('User details')">
            {{-- <h3 class="text-2xl font-semibold">{{ $user->name }} profile</h3> --}}

            <div class="min-h-[60vh]">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            @if (session('error'))
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ session('error') }}
            </div>
            @endif


            @if (session('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('success') }}
            </div>
            @endif

            @if (session()->has('warning'))
            <div class="mb-4 font-medium text-sm text-yellow-600">
                {{ session('warning') }}
            </div>
            @endif

            @if (session('info'))
            <div class="mb-4 font-medium text-sm text-blue-600">
                {{ session('info') }}
            </div>
            @endif

            {{-- @dump($quizzesPassed) --}}
            <div class="flex space-x-2 justify-end mb-4">
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit
                    User</a>

                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Back
                    to
                    Users</a>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @forelse($quizzesPassed as $index => $quiz)
                  <div class="flex flex-col p-4 bg-primary rounded-lg border shadow-md hover:shadow-lg">
                    <div class="flex flex-col items-center justify-between mb-2">
                      <div class="flex flex-col items-center gap-2">

                            <p class="text-sm font-medium text-white">Quiz {{ $index + 1 }}
                                @switch($quiz['userQuizState']->state)
                                    @case('completed')
                                        <span class="text-xs px-2 py-1 rounded-full bg-green-200 text-green-700">
                                            Finished
                                        </span>
                                        @break
                                    @case('in_progress')
                                        <span class="text-xs px-2 py-1 rounded-full bg-yellow-200 text-yellow-700">
                                            Not finished
                                        </span>
                                        @break
                                    @case('not_started')
                                        <span class="text-xs px-2 py-1 rounded-full bg-gray-200 text-gray-700">
                                            Not Started Yet
                                        </span>
                                        @break
                                @endswitch
                            </p>
                          </span></p>
                        <div class="text-sm font-medium text-gray-200">Title: {{ $quiz['quiz']->title }} </div>
                        <div class="flex items-center gap-2">
                      </div>
                        <p class="text-sm text-gray-200">Description: <span class="inline-block">{{ Str::limit($quiz['quiz']->description, 50, '...') }}</span></p>
                      </div>
                    </div>
                    <a href="{{ route('admin.quizzes.show', $quiz) }}" class="flex bg-blue-50 items-center justify-center py-2 px-4 text-sm font-medium text-blue-600 rounded-md shadow-md hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      <span>Show quiz details</span> <i class="text-lg ml-2 fas fa-eye"></i>
                    </a>
                  </div>
                @empty
                  <p class="text-center p-4">No quizzes</p>
                @endforelse
              </div>


            </div>



            {{-- <p class="max-w-2xl text-sm leading-6 text-gray-500 ">Client details.</p> --}}
            {{-- <div class="flex justify-between items-center">
                <div class="w-full">
                    <div class="mt-6 border-t border-gray-100">
                        <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6  text-gray-900">
                                    Full name</dt>
                                <dd class="mt-1 text-sm leading-6  text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $user->name }}
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6  text-gray-900">Email address
                                </dt>
                                <dd class=" mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $user->email }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 ">Phone number
                                </dt>
                                <dd class="mt-1  text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{
                                    $user->mobile_number }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 ">Avatar</dt>
                                <dd class="mt-2 text-sm text-gray-900  sm:col-span-2 sm:mt-0">
                                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                            <div class="flex w-0 flex-1 items-center">
                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <span class="truncate font-medium">my_picture.jpg</span>
                                                    <span class="ml-1 flex-shrink-0 text-gray-400">2.4mb</span>
                                                </div>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="#"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                            </div>
                                        </li>

                                    </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div> --}}
        </div>

        </x-dashboard-main-content>
        @endauth

    </div>
</x-admin-layout>
