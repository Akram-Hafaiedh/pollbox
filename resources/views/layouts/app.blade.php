<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="h-screen flex ">
        <!--Sidebar -->
        <div
            class='w-64 h-screen bg-gray-800 text-gray-100 fixed left-0 top-0 overflow-y-auto transition-all duration-300'>
            <div class='flex flex-col items-center my-5'>
                <a href='{{ route("admin.dashboard") }}'>
                    <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                </a>
                <div class='p-5'>
                    <a href="{{ route('admin.dashboard') }}" class="text-2xl font-semibold text-white">
                        {{ config('app.name') }}
                    </a>
                </div>
            </div>
            <div class='flex flex-col mt-10'>
                <x-side-link route="admin.dashboard" icon="home">Dashboard</x-side-link>
                <x-side-link route="admin.users.index" icon="user">Clients</x-side-link>
                <x-side-link route="admin.quizzes.index" icon="user">Quizzes</x-side-link>
                <x-side-link route="admin.topQuizzes" icon="user">Top 3 Clients Reports</x-side-link>
                <x-side-link route="dashboard" icon="user">Settings</x-side-link>
                <x-side-link route="dashboard" icon="user">More Settings</x-side-link>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-10">
            <div class="bg-white p-4 shadow-md rounded-md">
                <!-- Header section -->
                @if (isset($header))
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

                <!-- Page Content -->
                <main class="relative">
                    {{-- @if (!isset($header) && !empty(config('app.name')))
                    <h1 class="text-2xl font-semibold mb-4">{{ config('app.name') }}</h1>
                    @endif --}}
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
