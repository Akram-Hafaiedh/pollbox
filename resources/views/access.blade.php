<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Code acces for private quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex items-center justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">


                <div class="p-4">
                    <label for="barcode" class="block font-medium text-gray-700">Barcode:</label>
                    <input type="text" id="barcode" class="block w-40 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" maxlength="4" placeholder="1234">
                  </div>

        </div>
    </div>
</x-app-layout>
