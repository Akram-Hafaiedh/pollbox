<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        <x-dashboard-main-content :page-title="__('Admin Quizzes')">
            {{-- <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin Quizzes page!</h3> --}}
            {{-- <p>Your role: {{ auth()->user()->role }}</p> --}}
            <div class="flex items-center justify-between ">
                <div>
                    <a href="{{ route('admin.quizzes.create') }}"
                        class="text-white inline-flex items-center px-4 py-2 tracking-widest  transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md  hover:bg-indigo-700  focus:bg-indigo-700  active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2">{{
                        __('Add Quiz')
                        }}</a>
                    {{-- TODO DELETE ALL --}}
                    <a href="#"
                        class="text-white inline-flex items-center px-4 py-2 tracking-widest  transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md  hover:bg-blue-700  focus:bg-blue-500 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2">{{
                        __('Delete all')
                        }}</a>

                </div>
                <form action="{{ route('admin.quizzes.index') }}" method="GET">
                    <x-text-input id="search" name="search" type="text" class="mt-1" :value="old('search',$search)"
                        placeholder="Search quizzes" />
                    <button type="submit">Search</button>
                </form>
            </div>

            @if(isset($quizzes))
            <table class="table w-full my-4 divide-y">
                <thead class="font-medium text-left bg-indigo-300 py-2">
                    <tr>
                        <th class="py-2">#</th>
                        <th class="py-2">Title</th>
                        <th class="py-2 ">Description</th>
                        <th class="py-2 text-center">Questions</th>
                        <th cols="1" class="py-2 ">Members</th>
                        <th class="py-2 ">Active</th>
                        <th class="py-2 text-center">Time Limit</th>
                        <th class="py-2 text-center">Created At</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($quizzes as $quiz)
                    <tr class="hover:bg-indigo-100 odd:bg-gray-100 even:bg-white">
                        <td>{{ $quiz->id }}</td>
                        <td>{{ Str::limit($quiz->title,20) }}</td>
                        <td>{{ Str::limit($quiz->description, 50) }}</td>
                        <td class="text-center"> {{ count($quiz->questions) }}</td>
                        <td>
                            {{ rand(1,100) }}
                        </td>
                        <td>@if ($quiz->active) <span class="text-green-500">Active</span> @else <span
                                class="text-red-500">Inactive</span> @endif</td>
                        <td class="text-center">{{ $quiz->time_limit ? $quiz->time_limit . ' mins' : '-' }}</td>
                        <td class="text-center">{{ $quiz->created_at->format('Y-m-d') }}</td>
                        <td class="flex justify-center space-x-2">
                            <a href="{{ route('admin.quizzes.show', $quiz->id) }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-500 fill-white hover:text-blue-700 hover:underline ">
                                view
                            </a>
                            {{-- <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md shadow-sm dark:bg-white dark:fill-red-500 fill-white dark:hover:bg-red-100 hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </button>
                            </form> --}}
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
</x-app-layout>
