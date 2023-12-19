<x-app-layout>

    <div class="flex flex-col md:flex-row">
        @auth
        <x-dashboard-main-content :page-title="  __('Clien details')">
            <h3 class="text-2xl font-semibold">{{ $user->name }} profile</h3>
            {{-- <p class="max-w-2xl text-sm leading-6 text-gray-500 ">Client details.</p> --}}
            <div class="flex justify-between items-center">
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
                            {{-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">About</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Fugiat ipsum
                                    ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat.
                                    Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea
                                    officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit
                                    deserunt qui eu.</dd>
                            </div> --}}
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
            </div>
            <div class="flex space-x-2 justify-end mt-4">
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit
                    User</a>

                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Back
                    to
                    Users</a>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>