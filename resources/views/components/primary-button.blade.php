<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center p-4 bg-[#064b7a]

    border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
    hover:bg-[#032d49] focus:bg-[#032d49] active:bg-gray-900
    dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
