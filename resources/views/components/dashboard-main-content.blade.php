<div class="flex flex-col w-full min-h-full">
    <!-- Header section inside main content-->
    <header class="w-full rounded shadow bg-primary">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $pageTitle }}
            </h2>
        </div>
    </header>
    <!-- Content inside the main content -->
    <div class="min-w-full pt-8 mx-auto">
        <div class="bg-white sm:rounded-lg">
            <div class="w-full text-gray-900">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
