<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Quizzes') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg">
                <h2 class="mb-2 text-xl font-bold">{{ now()->format('d F, l') }}</h2>
                <div class="flex justify-end mb-4 space-x-2">
                    {{-- <p class="text-white">Scheduled: 24</p> --}}
                    <p class="text-white">Pending: <span class="font-bold text-black">15</span></p>
                    <p class="text-white">Completed: <span class="font-bold text-back">09</span> </p>
                </div>
            </div>

            <div class="grid flex-col grid-cols-2 gap-4 pt-4 overflow-hidden bg-white border-t border-gray-200 shadow-sm">

                <img class="rounded opacity-40" src="{{ asset('images/bg-1.jpg') }}" alt="Your Image">

              <!--Quiz Card -->

                <div class="relative p-6 text-white bg-center bg-cover border-2 rounded-lg b bg-gradient-to-br from-indigo-900 to-indigo-400"
                style="background-image: url('{{ asset('images/bg-1.jpg') }}');"
                >
                    <div class="absolute inset-0 z-0 bg-black opacity-50"></div>
                    <div class="z-10">
                        <h2 class="mb-2 text-xl font-bold">Quiz title  </h2>
                    <div class="flex items-center justify-between mb-4">
                        <p>Quiz Every large design company whether it’s a multi-national branding
                            corporation or a regular.</p>
                        {{-- <p class="flex items-center text-green-500">
                            80%
                        </p> --}}
                    </div>
                    <div class="w-full h-2 mb-4 bg-gray-700 rounded">
                        <div class="h-2 bg-green-500 rounded w-[90%]"></div>
                    </div>
                    <p class="text-white">90% complete</p>
                    </div>
                </div>
              <!--Quiz Card -->

                <div class="p-6 text-white border-2 rounded-lg b bg-gradient-to-br from-indigo-900 to-indigo-400"

                >
                    <h2 class="mb-2 text-xl font-bold">Quiz title  </h2>
                    <div class="flex items-center justify-between mb-4">
                        <p>Quiz Every large design company whether it’s a multi-national branding
                            corporation or a regular.</p>
                        {{-- <p class="flex items-center text-green-500">
                            80%
                        </p> --}}
                    </div>
                    <div class="w-full h-2 mb-4 bg-gray-700 rounded">
                        <div class="h-2 bg-green-500 rounded w-[90%]"></div>
                    </div>
                    <p class="text-white">90% complete</p>
                </div>


                <!--Quiz Card -->

                <div class="relative p-6 text-black bg-gray-200 border-2 border-gray-800 rounded-lg">
                    <h2 class="mb-2 text-xl font-bold">Complete Analysis 🔒</h2>
                    <p class="mb-4">Every large design company whether it’s a multi-national branding
                        corporation or a regular.</p>
                    <div class="w-full h-2 mb-4 bg-gray-400 rounded">
                        <div class="h-2 bg-green-500 w-[0%]"></div>
                    </div>
                    <p class="mb-4">0% complete</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>

                        <button class="w-10 h-10 text-white bg-indigo-500 rounded-full">+</button>
                    </div>
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-gray-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!--Quiz Card -->
                <div class="relative p-6 bg-gray-200 border-2 border-gray-800 rounded-lg">
                    <h2 class="mb-2 text-xl font-bold">Complete Analysis 🔒</h2>
                    <p class="mb-4">Every large design company whether it’s a multi-national branding
                        corporation or a regular.</p>
                    <div class="w-full h-2 mb-4 bg-gray-700 rounded">
                        <div class="h-2 bg-green-500 rounded" style="width:80%;"></div>
                    </div>
                    <p class="mb-4">80% complete</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                            Si
                        </div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                            Ah
                        </div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                            Ka
                        </div>

                        <button class="w-10 h-10 bg-white rounded-full">+</button>
                    </div>
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-gray-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
