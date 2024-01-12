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

<body class="font-sans antialiased text-gray-900 ">
    <div class="flex flex-row items-center w-full min-h-screen pt-6 sm:justify-left sm:pt-0">

        {{-- <img class="" src="{{ asset('images/login-bg.jpg') }}" alt="Your Image"> --}}
        {{-- <img class="" src="{{ asset('images/login-bg.jpg') }}" alt="Your Image"> --}}


        <!-- Left side -->
        <div class="relative hidden w-1/2 min-h-screen bg-center bg-cover md:block"
            style="background-image: url('{{ asset('images/login-bg.jpg') }}')">
            <!-- Dark mask -->
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Content for the left side -->
            <div class="relative z-10 flex items-center justify-center h-screen text-white">
                <div class="max-w-md p-4 rounded bg-black/50">
                    <h2 class="mb-4 text-4xl font-bold">Welcome <span class="italic text-[#ff9f1c] "> Back</span></h2>
                    <p class="text-lg ">Explore diverse surveys and quizzes, engage with thought-provoking questions,
                        and elevate your knowledge with <span class="italic text-[#ff9f1c]">Poll Box!</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="w-full px-6 py-4 mx-auto overflow-hidden bg-white md:w-1/2 sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
