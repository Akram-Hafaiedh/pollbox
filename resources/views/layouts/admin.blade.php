<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="{{ $lang ?? 'en' }}" dir="{{ $dir ?? 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" sizes="180x180" href="{{ asset('assets/favicon.svg') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100" >
    <div class="flex h-screen pb-10">
        <!--Sidebar -->

        <x-admin-sidebar />

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            @unless (Auth::check() && Auth::user()->role === 'admin')
                @include('layouts.navigation')
            @endunless


            <div class="p-4 m-10 bg-white rounded-md shadow-md">
                <!-- Header section -->
                @if (isset($header))
                    <header class="shadow">
                        <div class="">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="relative">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
