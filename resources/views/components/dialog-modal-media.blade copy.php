@props(['id' => null, 'maxWidth' => null])

<x-modal-media :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="w-full bg-red-500">
        {{ $content }}
    </div>
    

</x-modal-media>
