<div>
    <div class='flex justify-center my-5'>
        <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
    </div>

    <x-side-link route="admin.dashboard">
        {{ __('Dashboard') }}
    </x-side-link>
    <x-side-link route="admin.users.index">
        {{ __('Clients') }}
    </x-side-link>
    <x-side-link route="admin.quizzes.index">
        {{ __('Quizzes') }}
    </x-side-link>
    <x-side-link route="admin.surveys.index">
        {{ __('Surveys') }}
    </x-side-link>
    <x-side-link route="dashboard">
        {{ __('Client Reports') }}
    </x-side-link>
    <x-side-link route="admin.topQuizzes">
        {{ __('Top 3 Clients Report') }}
    </x-side-link>
    <x-side-link route="dashboard">
        {{ __('Settings') }}
    </x-side-link>
    <x-side-link route="dashboard">
        {{ __('More Settings') }}
    </x-side-link>
</div>
