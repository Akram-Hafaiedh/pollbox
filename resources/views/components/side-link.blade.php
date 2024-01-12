@props(['route', 'icon' => null])

@php
$isActive = request()->routeIs($route . '*');
// $isActive = request()->currentRouteNamed($route . '*');
// $isActive = Str::startsWith(Route::currentRouteName(), $route);
$classes = $isActive
? 'bg-primary  text-white px-3'
: 'text-primary  hover:text-white  hover:bg-secondary';
@endphp

<a href="{{ route($route) }}" class="group flex items-center px-2 py-2 text-sm font-medium {{ $classes }}">
    @if ($icon)
    <i class="mr-2 fas fa-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
