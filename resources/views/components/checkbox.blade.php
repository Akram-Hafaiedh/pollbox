@props(['disabled' => false, 'checked' => false])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $checked ? 'checked' : '' }} {!! $attributes->merge(['class'
=> 'form-checkbox h-6 w-6 text-indigo-600 transition duration-150 ease-in-out focus:outline-none
focus:shadow-outline-indigo dark:text-gray-400 dark:focus:shadow-outline-gray']) !!}>