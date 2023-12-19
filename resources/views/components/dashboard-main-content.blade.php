<div class="flex flex-col w-full  min-h-full">
    <!-- Header section inside main content-->
    <header class="w-full bg-gradient-to-r to-sky-500 from-indigo-500 shadow rounded">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $pageTitle}}
            </h2>
        </div>
    </header>
    <div class="min-w-full pt-4 mx-auto">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="w-full p-4 text-gray-900">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>