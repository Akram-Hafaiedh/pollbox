<div class='fixed top-0 left-0 w-64 h-screen overflow-y-auto text-gray-100 transition-all duration-300 bg-gray-200'>
    <div class="flex flex-col justify-between h-full" x-data="{openQuiz:false}">
        <div>
            <div class='flex flex-col items-center my-5'>
                <a href='{{ route("admin.dashboard") }}'>
                    <img class="h-28 w-28" src="{{ asset('assets/icon2.svg') }}" alt="Logo">
                    {{--
                    <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" /> --}}
                </a>
            </div>
            <div class='flex flex-col mt-10'>
                <x-side-link route="admin.dashboard" icon="fa fa-home">Dashboard</x-side-link>
                <x-side-link route="admin.users.index" icon="fa fa-user">Users</x-side-link>
                <x-side-link route="admin.quizzes.index" icon="fa fa-user">Quizzes</x-side-link>
                {{-- <div class="">
                    <button @click="openQuiz = !openQuiz" type="button"
                        class="flex items-center justify-between w-full px-2 py-2 text-sm font-semibold text-left bg-gray-200 text-primary hover:bg-secondary hover:text-white focus:outline-none focus:bg-secondary">
                        <span>
                            <i class="fa fa-question-circle"></i>
                            Quizzes
                        </span>
                        <svg :class="{'transform rotate-180': openQuiz}" class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="openQuiz">
                        <a href="{{ route('admin.exams.index') }}"
                            class="block px-4 py-2 text-sm text-primary hover:bg-secondary hover:text-white">Exam</a>
                        <a href="{{ route('admin.quizzes.index') }}"
                            class="block px-4 py-2 text-sm text-primary hover:bg-secondary hover:text-white">Survey</a>
                        <a href="{{ route('admin.assessments.index') }}"
                            class="block px-4 py-2 text-sm text-primary hover:bg-secondary hover:text-white">Assessements</a>
                    </div>
                </div> --}}
                {{-- <x-side-link route="admin.quizzes.index" icon="fa fa-question-circle">Quizzes</x-side-link> --}}

                <x-side-link route="admin.reports.quizzes" icon="fa fa-bar-chart">Reports</x-side-link>
                {{-- <x-side-link route="admin.settings.index" icon="fa fa-cogs">Settings</x-side-link> --}}
                {{-- <x-side-link route="admin.more-settings" icon="fa fa-cog">More Settings</x-side-link> --}}
                <!-- User Information and Logout Link -->
            </div>
        </div>
        <div class="p-4 mt-auto space-y-2 text-white divide-y bg-[#064b7a]">
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="px-4 py-2 rounded-md"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Logout
                </a>
            </form>
            {{-- <span class="block ">{{ Auth::user()->role }}</span> --}}
            <div class="flex items-center pt-2 mb-2">
                <div
                    class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-white bg-orange-600 rounded-full">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <div>
                    <span class="ml-auto font-semibold text-gray-400">{{ Auth::user()->email }}</span>
                    <span class="block ">{{ Auth::user()->name }}</span>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
