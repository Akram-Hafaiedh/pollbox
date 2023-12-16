<div class="flex flex-col w-full">
    <header class="w-full bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $pageTitle}}
            </h2>
        </div>
    </header>
    <div class="min-w-full py-12 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="w-full p-6 text-gray-900 dark:text-gray-100">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>