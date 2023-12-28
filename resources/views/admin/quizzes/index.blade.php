<x-app-layout>
    <div x-data="{ isOpenDestroyAll: false, isOpenDeleteSingle: false , quizToDelete:null}">
        <div class="flex flex-col md:flex-row" >
            @auth
            <x-dashboard-main-content :page-title="__('Admin Quizzes')">
                <div class="flex items-center justify-between ">
                    <div class="flex items-center space-x-2">
                        <div class="flex" x-data="{ pdfFile: false, csvFile: false }">
                            <label for="pdf-file" class="mr-2" @click="pdfFile = true">
                                <input id="pdf-file" type="file" accept=".pdf" class="hidden" x-ref="pdfInput">
                                <button type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" x-on:click="$refs.pdfInput.click()">
                                    <svg class="inline-block w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 6h16M4 12h8m-8 6h16" />
                                    </svg>
                                    Import PDF
                                </button>
                            </label>
                            <label for="csv-file">
                                <input id="csv-file" type="file" accept=".csv" class="hidden" x-ref="csvInput">
                                <button type="button" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700" x-on:click="$refs.csvInput.click()">
                                    <svg class="inline-block w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                    Import CSV
                                </button>
                            </label>
                        </div>
                        <a href="{{ route('admin.quizzes.create') }}"
                        class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-purple-500 border border-transparent rounded-md hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-700 focus:ring-offset-2">
                            {{ __('Add quiz') }}
                        </a>

                        <form @submit.prevent="isOpenDestroyAll = true" method='POST' action="{{ route('admin.quizzes.destroyAll') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" x-on:click="isOpenDestroyAll = true" class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-yellow-500 border border-transparent rounded-md hover:bg-yellow-700 focus:bg-yellow-500 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:ring-offset-2">
                                {{ __('Delete all') }}
                            </button>
                        </form>
                        <!-- Confirmation Modals for deleteAll() -->
                        <div x-cloak x-show="isOpenDestroyAll" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-end justify-center p-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="isOpenDestroyAll" class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                <!-- Confirmation Modal Content -->
                                <div x-show="isOpenDestroyAll" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation -->
                                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Destroy All Quizzes
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">
                                                        Are you sure you want to destroy all quizzes? This action cannot be
                                                        undone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <form method="POST" action="{{ route('admin.quizzes.destroyAll') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Destroy
                                            </button>
                                        </form>
                                        <button type="button" x-on:click="isOpenDestroyAll = false" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Confirmation Modals for deleteOne() -->
                        <div x-cloak x-show="isOpenDeleteSingle" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-end justify-center p-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="isOpenDeleteSingle" class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                <!-- Confirmation Modal Content -->
                                <div x-show="isOpenDeleteSingle" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation -->
                                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Deteting a Quiz
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">
                                                        Are you sure you want to delete this quiz? This action cannot be
                                                        undone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                        {{-- <button type="submit"
                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Confirm
                                    </button> --}}

                                        <form :action="`/admin/quizzes/${quizToDelete}`" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <script>
                                                console.log('Form action:', `/admin/quizzes/${quizToDelete}`);
                                            </script>
                                            <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">{{
                                            __('Delete') }}</button>
                                        </form>
                                        <button type="button" x-on:click="isOpenDeleteSingle = false" class="inline-flex justify-center w-full px-4 py-2 mt-3 mr-4 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.quizzes.index') }}" method="GET">
                        <x-text-input id="search" name="search" type="text" class="mt-1" :value="old('search',$search)" placeholder="Search quizzes" />
                        <button type="submit">Search</button>
                    </form>
                </div>
        </div>

        @if(isset($quizzes))
        <table class="table w-full my-4 divide-y">
            <thead class="py-2 font-medium text-left text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                <tr>
                    <th class="py-2">#</th>
                    <th class="py-2">Title</th>
                    <th class="py-2 ">Description</th>
                    <th class="py-2 text-center">Start Date</th>
                    <th class="py-2 text-center">End Date</th>
                    <th class="py-2 text-center">Active</th>
                    <th class="py-2 text-center">Questions</th>
                    <th cols="1" class="py-2 ">Members</th>
                    <th class="py-2 ">Visibility</th>
                    <th class="py-2 text-center text-nowrap">Created At</th>
                    <th class="py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($quizzes as $quiz)
                <tr class="hover:bg-indigo-100 odd:bg-gray-100 even:bg-white">
                    <td>{{ $quiz->id }}</td>
                    <td>{{ Str::limit($quiz->title,20) }}</td>
                    <td>{{ Str::limit($quiz->description, 50) }}</td>
                    <td class="text-center text-nowrap">{{ $quiz->start_date }}</td>
                    <td class="text-center text-nowrap">{{ $quiz->end_date }}</td>
                    <td class="px-2 text-center">
                        @if ($quiz->active) <span class="text-green-500">Active</span>
                        @else <span class="text-red-500">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center"> {{ count($quiz->questions) }}</td>
                    <td class="text-center">
                        {{ ($quiz->visibility === 'restricted') ? count($quiz->selectedUsers) :''}}
                        {{-- {{ rand(1,100) }} --}}
                    </td>
                    <td class="text-center">
                        {{ Str::ucfirst($quiz->visibility)}}
                    </td>
                    {{-- <td class="text-center">{{ $quiz->time_limit ? $quiz->time_limit . ' mins' : '-' }}</td> --}}
                    <td class="text-center">{{ $quiz->created_at->format('Y-m-d') }}</td>
                    <td class="flex justify-center space-x-1">
                        <!-- Show action -->
                        <a href="{{ route('admin.quizzes.show', $quiz) }}" class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-blue-200 hover:fill-indigo-700 ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                            </svg>
                        </a>
                        <!-- Edit action -->
                        <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-yellow-200 hover:fill-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                        </a>
                        <!-- Delete Action-->
                        <button x-data @click.prevent="isOpenDeleteSingle = true; quizToDelete={{ $quiz->id }}" type="submit" class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-red-100 hover:fill-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $quizzes->links() }}
        @endif
        </x-dashboard-main-content>
        @endauth

    </div>
    </div>
</x-app-layout>
