<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-ys2 rounded-md font-bold text-sm text-ys2 tracking-widest shadow-none hover:text-ys2 focus:outline-none focus:border-green-500 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
