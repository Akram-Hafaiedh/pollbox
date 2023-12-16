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

            @if(isset($quizzes))
            <table class="table divide-y divide-gray-200">
                <thead class="font-medium text-left text-gray-600">
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
                        <td class="flex space-x-2">
                            <a href="{{ route('admin.quizzes.edit', $quiz->id) }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-700">Edit</a>
                            <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md shadow-sm hover:bg-red-700">Delete</button>
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