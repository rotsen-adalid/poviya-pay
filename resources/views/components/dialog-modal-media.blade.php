@props(['id' => null, 'maxWidth' => null, 'total' => null])

<x-modal-media :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="flex justify-center items-center px-0">
        {{ $content }}
    </div>
</x-modal-media>
