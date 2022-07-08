@props(['disabled' => false])

<select  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-10 p-2 border border-gray-200 focus:border-gray-300 focus:ring focus:ring-green-50 focus:ring-opacity-50 rounded-md shadow-sm text-gray-900']) !!}>
    {{$option}}
</select>