@props(['route', 'icon' => null])

@php
$isActive = request()->routeIs($route . '*');
// $isActive = request()->currentRouteNamed($route . '*');
// $isActive = Str::startsWith(Route::currentRouteName(), $route);
$classes = $isActive
? 'bg-gray-200 text-gray-900 dark:bg-gray-600 dark:text-white px-3'
: 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100
dark:hover:bg-gray-700';
@endphp

<a href="{{ route($route) }}" class="group flex items-center px-2 py-2 text-sm font-medium {{ $classes }}">
    @if ($icon)
    <i class="mr-2 fas fa-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>