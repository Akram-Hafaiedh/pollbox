<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                <h2 class="font-bold text-xl mb-2">{{ now()->format('d F, l') }}</h2>
                <div class="flex justify-between mb-4">
                    {{-- <p class="text-gray-700">Scheduled: 24</p> --}}
                    <p class="text-gray-700">Pending: 15</p>
                    <p class="text-gray-700">Completed: 09</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm  flex flex-col space-y-2 border-t border-gray-200 pt-4">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}

                <div class="bg-gray-200 rounded-lg p-6">
                    <h2 class="font-bold text-xl mb-2">Quiz title</h2>
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-700">Quiz Every large design company whether it’s a multi-national branding
                            corporation or a regular.</p>
                        {{-- <p class="text-green-500 flex items-center">
                            80%
                        </p> --}}
                    </div>
                    <div class="w-full h-2 bg-gray-700 mb-4 rounded">
                        <div class="h-2 bg-green-500 rounded w-[90%]"></div>
                    </div>
                    <p class="text-gray-700">90% complete</p>
                </div>


                <!--Quiz Card -->

                <div class="relative bg-gray-200 rounded-lg p-6">
                    <h2 class="font-bold text-xl mb-2">Complete Analysis</h2>
                    <p class="text-gray-700 mb-4">Every large design company whether it’s a multi-national branding
                        corporation or a regular.</p>
                    <div class="w-full h-2 bg-gray-400 mb-4">
                        <div class="h-2 bg-green-500 w-[0%]"></div>
                    </div>
                    <p class="text-gray-700 mb-4">0% complete</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>

                        <button class="w-10 h-10 rounded-full bg-white text-gray-700">+</button>
                    </div>
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="relative bg-gray-200 rounded-lg p-6">
                    <h2 class="font-bold text-xl mb-2">Complete Analysis</h2>
                    <p class="text-gray-700 mb-4">Every large design company whether it’s a multi-national branding
                        corporation or a regular.</p>
                    <div class="w-full h-2 bg-gray-700 mb-4 rounded">
                        <div class="h-2 bg-green-500 rounded" style="width:80%;"></div>
                    </div>
                    <p class="text-gray-700 mb-4">80% complete</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                alt="Norman Walters profile picture">
                        </div>
                        <div
                            class="h-10 w-10 mr-3 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-sm">
                            Si
                        </div>
                        <div
                            class="h-10 w-10 mr-3 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-sm">
                            Ah
                        </div>
                        <div
                            class="h-10 w-10 mr-3 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-sm">
                            Ka
                        </div>

                        <button class="w-10 h-10 rounded-full bg-white text-gray-700">+</button>
                    </div>
                    <div class="absolute top-0 right-0 p-2">
                        <button class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-6 w-6">
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