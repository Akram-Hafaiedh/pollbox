<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="flex flex-col md:flex-row">

        @auth
        <div class="w-64 h-screen py-8 shadow-md text-gray-600-gray-100 dark:bg-gray-800 dark:text-gray-200">
            @if (auth()->user()->hasRole('admin'))
            <x-sidebar />
            @endif
        </div>
        <x-dashboard-main-content :page-title="  __('Admin Quizzes') ">
            <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin Quizzes page!</h3>
            {{-- <p>Your role: {{ auth()->user()->role }}</p> --}}
            <div class="flex justify-between items-center ">
                <div>

                    <a href="{{ route('admin.quizzes.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{
                        __('Create Quiz')
                        }}</a>
                    {{-- TODO DELETE ALL --}}
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{
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
            <table class="table w-full divide-y divide-gray-200 my-4">
                <thead class="font-medium text-left dark:text-gray-200 text-gray-600">
                    <tr>
                        <th>#</th>
                        <th class="text-center">Title</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th class="text-center">Time Limit</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-600">
                    @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ Str::limit($quiz->description, 50) }}</td>
                        <td>@if ($quiz->active) <span class="text-green-500">Active</span> @else <span
                                class="text-red-500">Inactive</span> @endif</td>
                        <td class="text-center">{{ $quiz->time_limit ? $quiz->time_limit . ' mins' : '-' }}</td>
                        <td class="text-center">{{ $quiz->created_at->format('Y-m-d') }}</td>
                        <td class="flex space-x-2 justify-center">
                            <a href="{{ route('admin.quizzes.edit', $quiz->id) }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white dark:bg-white bg-blue-500 fill-white dark:fill-blue-500 rounded-md shadow-sm hover:bg-blue-700 dark:hover:bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white dark:bg-white bg-red-500 dark:fill-red-500 fill-white rounded-md shadow-sm dark:hover:bg-red-100 hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </button>
                            </form>
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

{{-- @extends('layouts.admin')

@section('content')
<div class="flex flex-col">
    <h1 class="mb-4 text-2xl font-bold">Quizzes</h1>
    <a href="{{ route('admin.quizzes.create') }}"
        class="inline-block px-4 py-2 mb-4 text-white bg-blue-500 rounded shadow-md">Create New Quiz</a>
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Active</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $quiz->title }}</td>
                    <td class="px-4 py-3 truncate">{{ $quiz->description }}</td>
                    <td class="px-4 py-3">
                        @if ($quiz->active)
                        <span class="text-green-500">Yes</span>
                        @else
                        <span class="text-red-500">No</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.quizzes.edit', $quiz) }}"
                            class="px-2 py-1 text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection --}}