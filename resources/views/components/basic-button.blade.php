<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-white  border border-secondary-200 rounded-md font-semibold text-secondary-800 font-bold  tracking-widest hover:bg-secondary-200 active:bg-secondary-100 hover:border-secondary-100 hover:text-200 focus:outline-none focus:border-secondary-200 focus:ring-primary-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
