<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex font-bold justify-center items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-primary-700 active:bg-primary-700 focus:outline-none focus:border-primary-900 focus:ring focus:ring-primary-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
