<x-admin-layout>
    <div x-data="{ isOpenDestroyAll: false, isOpenDeleteSingle: false, quizToDelete: null }">
        <div class="flex flex-col md:flex-row">
            @auth
            <x-dashboard-main-content :page-title="__('Admin Asseessments')">
                @if (session('error'))
                    <div class="relative px-4 py-3 my-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="relative px-4 py-3 my-3 text-green-700 bg-green-100 border border-green-400 rounded"
                        role="success">
                        <strong class="font-bold">Success</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div class="flex items-center justify-between ">
                    <div class="flex space-x-2">
                        <div class="flex" x-data="{ pdfFile: false, csvFile: false }">
                            <label for="pdf-file" class="mr-2" @click="pdfFile = true">
                                <input id="pdf-file" type="file" accept=".pdf" class="hidden" x-ref="pdfInput">
                                <button type="button" disabled
                                    class="h-10 px-4 py-2 text-sm font-bold text-white rounded bg-primary hover:bg-blue-700 disabled:bg-primary/50"
                                    x-on:click="$refs.pdfInput.click()">
                                    <i class="inline-block w-4 h-4 mr-1 fa-regular fa-file-pdf"></i>
                                    Import PDF
                                </button>
                            </label>
                            <label for="csv-file">
                                <input id="csv-file" type="file" accept=".csv" class="hidden" x-ref="csvInput">
                                <button type="button" disabled
                                    class="h-10 px-4 py-2 text-sm font-bold text-white bg-green-500 rounded hover:bg-green-700 disabled:bg-green-300"
                                    x-on:click="$refs.csvInput.click()">
                                    <i class="inline-block w-4 h-4 mr-1 fa-solid fa-file-csv"></i>
                                    Import CSV
                                </button>
                            </label>
                        </div>
                        <a href="{{ route('admin.quizzes.create') }}"
                            class="inline-flex items-center h-10 px-4 py-2 text-sm font-bold text-white bg-indigo-500 rounded justiy-center hover:bg-green-700">
                            <i class="inline-block w-4 h-4 mr-1 fa-solid fa-plus"></i>
                            {{ __('Add New') }}
                        </a>

                        <form @submit.prevent="isOpenDestroyAll = true" method='POST'
                            action="{{ route('admin.quizzes.destroyAll') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" x-on:click="isOpenDestroyAll = true"
                                class="inline-flex items-center w-32 h-10 px-4 py-2 text-sm tracking-widest text-white transition duration-150 ease-in-out bg-yellow-500 border border-transparent rounded-md hover:bg-yellow-700 focus:bg-yellow-500 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:ring-offset-2">
                                <i class="inline-block w-4 h-4 mr-1 fa-solid fa-trash-can-arrow-up"></i>
                                {{ __('Delete all') }}
                            </button>
                        </form>
                        <!-- Confirmation Modals for deleteAll() -->
                        <div x-cloak x-show="isOpenDestroyAll" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-end justify-center p-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="isOpenDestroyAll" class="fixed inset-0 transition-opacity"
                                    aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>

                                <!-- Confirmation Modal Content -->
                                <div x-show="isOpenDestroyAll" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation -->
                                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Destroy All Quizzes
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">
                                                        Are you sure you want to destroy all quizzes? This action cannot
                                                        be
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
                                            <button type="submit"
                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Destroy
                                            </button>
                                        </form>
                                        <button type="button" x-on:click="isOpenDestroyAll = false"
                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Confirmation Modals for deleteOne() -->
                        <div x-cloak x-show="isOpenDeleteSingle" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-end justify-center p-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="isOpenDeleteSingle" class="fixed inset-0 transition-opacity"
                                    aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>

                                <!-- Confirmation Modal Content -->
                                <div x-show="isOpenDeleteSingle" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation -->
                                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z">
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


                                        <form :action="`/admin/quizzes/${quizToDelete}`" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <script>
                                                console.log('Form action:', `/admin/quizzes/${quizToDelete}`);
                                            </script>
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">{{
                                                __('Delete') }}</button>
                                        </form>
                                        <button type="button" x-on:click="isOpenDeleteSingle = false"
                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 mr-4 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.assessments.index') }}" method="GET" class="flex items-center space-x-4">
                        @csrf
                        <x-text-input id="search" name="search" type="text" class="text-sm border-gray-300 rounded-md"
                            :value="old('search', $search)" placeholder="Rechercher" />
                        <button
                            class="px-4 py-2 text-sm font-bold text-white rounded-md bg-secondary hover:text-black hover:bg-secondary/50"
                            type="submit">Search</button>
                    </form>
                </div>

                <table class="table w-full my-4 divide-y">
                    <thead
                        class="py-2 text-sm font-medium text-left text-white bg-gradient-to-r from-primary via-primary to-secondary">
                        <tr>
                            <th class="py-2">#</th>
                            <th class="py-2">Titre</th>
                            <th class="py-2 ">Description</th>
                            <th class="py-2 ">Langue</th>
                            <th class="py-2 text-center">Date de debut</th>
                            <th class="py-2 text-center">Date de fin</th>
                            <th class="py-2 text-center">Nb. Questions</th>
                            <th class="py-2 text-center">Nb. Personnes</th>
                            <th class="py-2 text-center">Visibilité</th>
                            <th class="py-2 text-center text-nowrap">Crée le</th>
                            <th class="py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse ($assessements as $assessement)
                        <tr class="hover:bg-indigo-100 odd:bg-gray-100 even:bg-white">
                            <td><a href="{{ route('admin.quizzes.show', $quiz) }}">{{ $quiz->id }}</a></td>
                            <td><a href="{{ route('admin.quizzes.show', $quiz) }}">{{ Str::limit($quiz->title, 20) }}</a>
                            </td>
                            <td><a href=''>{{ Str::limit($quiz->description, 50) }}</a></td>
                            <td>{{ $quiz->language === 'fr' ? 'Français' : ($quiz->language === 'en' ? 'Anglais' : 'Arabe') }}
                            </td>
                            <td class="text-center text-nowrap">{{ $quiz->start_date }}</td>
                            <td class="text-center text-nowrap">{{ $quiz->end_date }}</td>

                            <td class="text-center"> {{ count($quiz->questions) }}</td>
                            <td class="text-center">
                                {{ $quiz->visibility === 'restricted' ? count($quiz->selectedUsers) : '' }}
                                {{-- {{ rand(1,100) }} --}}
                            </td>
                            <td class="text-center">
                                {{ Str::ucfirst($quiz->visibility) }}
                            </td>
                            {{-- <td class="text-center">{{ $quiz->time_limit ? $quiz->time_limit . ' mins' : '-' }}</td> --}}
                            <td class="px-2 text-center text-nowrap">{{ $quiz->created_at->format('Y-m-d') }}</td>
                            <td class="flex justify-center space-x-1">
                                <!-- Show action -->
                                <a href="{{ route('admin.quizzes.show', $quiz) }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-blue-200 hover:fill-indigo-700 ">
                                    <i class="text-lg text-secondary fa-solid fa-eye"></i>
                                </a>
                                <!-- Edit action -->
                                <a href="{{ route('admin.quizzes.edit', $quiz) }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-yellow-200 hover:fill-indigo-700">
                                    <i class="text-lg text-secondary fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Delete Action-->
                                <button x-data @click.prevent="isOpenDeleteSingle = true; quizToDelete={{ $quiz->id }}"
                                    type="submit"
                                    class="inline-flex items-center p-2 text-sm font-medium text-white rounded-md shadow-sm fill-indigo-500 hover:bg-red-100 hover:fill-indigo-700">
                                    <i class="text-lg text-secondary fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center bg-gray-300">
                                <p class="text-primary min-h-[50vh] flex items-center justify-center space-x-2 ">
                                    <i class="text-xl fas fa-scribd"></i><span class="text-lg font-semibold"> No Assessements
                                        Found
                                    </span>
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $assessements->links() }}
            </x-dashboard-main-content>
            @endauth
        </div>
    </div>
</x-admin-layout>
