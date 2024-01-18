{{-- @props(['disabled' => false]) --}}
{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#064b7a]
focus:ring-[#064b7a] rounded-md shadow-sm']) !!}> --}}

@props(['disabled' => false, 'value' => ''])

<input value="{{ $value }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#064b7a] focus:ring-[#064b7a] rounded-md shadow-sm']) !!}>

