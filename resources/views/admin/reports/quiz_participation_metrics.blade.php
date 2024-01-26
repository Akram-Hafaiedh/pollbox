<x-admin-layout>
    <div class="flex flex-col md:flex-row">
        <x-dashboard-main-content :page-title="__('Quiz Participation Metrics')">
            <div class="p-4 bg-gray-100">
                <a href="{{ url()->previous() }}">Go Back</a>
            </div>
        </x-dashboard-main-content>
    </div>
</x-admin-layout>
