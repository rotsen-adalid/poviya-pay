<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-1 py-0 bg-gray-900 border-none border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 h-7 w-7 flex justify-center m-1 opacity-90 ']) }}>
    {{ $slot }}
</button>
