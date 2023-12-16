<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="flex flex-col md:flex-row">

        @auth
        <div class="w-64 h-screen py-8 text-gray-600 bg-gray-100 shadow-md dark:bg-gray-800 dark:text-gray-200">
            @if (auth()->user()->hasRole('admin'))
            <x-sidebar />
            @endif
        </div>
            <x-dashboard-main-content :page-title="  __('Admin Dashboard') ">
                <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin dashboard!</h3>
                {{-- <p>Your role: {{ auth()->user()->role }}</p> --}}

                <p>This is your admin dashboard content.</p>

            </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
