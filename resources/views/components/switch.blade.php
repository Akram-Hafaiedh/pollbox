@props(['initialValue' => false, 'name'])

{{-- @dd($name) --}}
<div x-data="{ on:  {{ $initialValue ? 'true' : 'false' }} }">
    <div :class="{ 'bg-blue-500': on, 'bg-gray-500': !on }"
        class="relative w-12 h-6 rounded-full shadow-inner cursor-pointer" @click="on = !on">
        <input type="checkbox" :value="on ? '1' : '0'" class="hidden" name="{{ $name }}" x-model="on" {{--
            :value="on?'1':'0'" --}}>
        <span :class="{ 'translate-x-6': on, 'translate-x-0': !on }"
            class="inline-block w-5 h-5 bg-white rounded-full shadow transform transition-transform duration-200 absolute top-0.5 left-0.5"></span>
    </div>
</div>