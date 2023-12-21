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
        @if (Auth::check() && Auth::user()->role === 'admin')
        <div
            class='w-64 h-screen bg-gray-800 text-gray-100 fixed left-0 top-0 overflow-y-auto transition-all duration-300'>
            <div class="flex flex-col justify-between h-full">
                <div>
                    <div class='flex flex-col items-center my-5'>
                        <a href='{{ route("admin.dashboard") }}'>
                            <x-application-logo
                                class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
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
                        <!-- User Information and Logout Link -->
                    </div>
                </div>
                <div class="mt-auto p-4 text-white bg-gray-700 divide-y space-y-2">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md">
                            Logout
                        </button>
                    </form>
                    {{-- <span class="block ">{{ Auth::user()->role }}</span> --}}
                    <div class="flex items-center mb-2 pt-2">
                        <div
                            class="h-10 w-10 mr-3 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-sm">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div>
                            <span class="ml-auto font-semibold text-gray-400">{{ Auth::user()->email }}</span>
                            <span class="block ">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        @endif
        <!-- Main Content -->
        <div class="flex-1  {{ Auth::check() && Auth::user()->role == 'admin' ? 'ml-64' : '' }}">
            @unless(Auth::check() && Auth::user()->role == 'admin')
                @include('layouts.navigation')
            @endunless
            <div class="bg-white p-4 shadow-md rounded-md m-10">
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
