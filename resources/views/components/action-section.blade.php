<div class="" {{ $attributes }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5">
        <div class="px-0 py-5 sm:p-0 bg-white">
            {{ $content }}
        </div>
    </div>
</div>
