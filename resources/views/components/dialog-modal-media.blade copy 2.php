@props(['id' => null, 'maxWidth' => null])

<x-modal-media :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="max-w-full sm:max-w-3xl mx-auto h-screen flex justify-between items-center -mt-18"> <!-- max-w-full mx-auto h-screen flex items-center -->
        @if (isset($previus))
        <div>
            {{$previus}}
        </div>
        @endif
        <div class="px-0 py-0">
            <div class="mt-0">
                {{ $content }}
            </div>
        </div>

        @if (isset($next))
        <div>
            {{$next}}
        </div>
        @endif
    </div>
    

</x-modal-media>
