@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-2 border border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-50 focus:ring-opacity-50 rounded-md shadow-sm']) !!} cols="10" rows="3"></textarea>
