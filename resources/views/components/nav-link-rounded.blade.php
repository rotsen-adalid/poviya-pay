@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex space-x-1 items-center px-2 py-2 border-b-none bg-primary-50 w-full rounded-lg font-semibold leading-5 text-primary-600 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out font-bold'
            : 'inline-flex space-x-1 items-center px-2 py-2 border-transparent w-full rounded-lg font-semibold leading-5 text-gray-500 hover:text-gray-700 hover:bg-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
