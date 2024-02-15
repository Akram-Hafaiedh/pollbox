<x-admin-layout>
    <div class="flex flex-col md:flex-row">

        @auth

        <x-dashboard-main-content :page-title="  __('Admin Dashboard') ">

            <div class="p-6 py-6 space-y-4 bg-gray-200">
                <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-purple-600 bg-purple-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">{{ count($users) }}</span>
                            <span class="block text-gray-500">Users</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-green-600 bg-green-100 rounded-full">
                            {{-- <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg> --}}
                            <svg class="fill-green-600" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                viewBox="0 0 512 512">
                                <path
                                    d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">6.8</span>
                            <span class="block text-gray-500">Total Responses</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-red-600 bg-red-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold">9</span>
                            <span class="inline-block text-xl font-semibold text-gray-500">(14%)</span>
                            <span class="block text-gray-500 overflow-w">Underperforming students</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-blue-600 bg-blue-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            {{-- TODO - TRACK FINISHED QUIZ --}}
                            <span class="block text-2xl font-bold">{{ count($quizzes) }}</span>
                            <span class="block text-gray-500">Total Quizzes</span>
                        </div>
                    </div>
                </section>
                <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col">
                    <div class="flex flex-col bg-white rounded-lg shadow md:col-span-2 md:row-span-2">
                        <div class="px-6 py-5 font-semibold border-b border-gray-100">The number of quizzes done per month</div>
                        <div class="flex-grow p-4">
                            <div
                                class="flex items-center justify-center h-full px-4 py-16 text-3xl font-semibold text-gray-400 bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">
                                Chart</div>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-yellow-600 bg-yellow-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path fill="#fff"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">25</span>
                            <span class="block text-gray-500">Lections left</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-teal-600 bg-teal-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">139</span>
                            <span class="block text-gray-500">Hours spent on lections</span>
                        </div>
                    </div>
                    <div class="col-span-3 row-span-3 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                            <span>My users</span>
                            {{-- <button type="button"
                                class="inline-flex justify-center px-1 -mr-1 text-sm font-medium leading-5 text-gray-500 bg-white rounded-md hover:text-gray-600"
                                id="options-menu" aria-haspopup="true" aria-expanded="true">
                                Descending
                                <svg class="w-5 h-5 ml-1 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                            </button>
                        </div>
                        <div class="overflow-y-auto max-h-[34rem]">
                            <ul class="p-6 space-y-6">
                                {{-- <li class="flex items-center">
                                    <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                                        <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                            alt="Norman Walters profile picture">
                                    </div>
                                    <span class="text-gray-600">Norman Walters</span>
                                    <span class="ml-auto font-semibold">7.7</span>
                                </li> --}}
                                @foreach ( $users as $user)
                                <li class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                    <span class="text-gray-600">{{ $user->name }}</span>
                                    <span class="ml-auto font-semibold">9.3</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </section>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-admin-layout>
