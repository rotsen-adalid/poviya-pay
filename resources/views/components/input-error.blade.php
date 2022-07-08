@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 flex items-center space-x-1']) }}>
        <span class="text-base material-icons-outlined">error_outline</span>
        <span>{{ $message }}</span>
    </p>
@enderror
