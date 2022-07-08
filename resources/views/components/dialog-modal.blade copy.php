@props(['id' => null, 'maxWidth' => null, 'bg' => null, 'close' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" :bg="$bg" :close="$close" {{ $attributes }}>
    <div class="px-6 pb-4">
        @if (isset($title))
            <div class="text-lg font-bold">
                {{ $title }}
            </div>
            <div class="mt-0">
                {{ $content }}
            </div>
        @else 
            <div class="mt-0">
                {{ $content }}
            </div>
        @endif
       
    </div>

    @if (isset($footer))
        <div class="px-6 py-3 space-y-1 text-right">
            {{ $footer }}
        </div>
    @endif

</x-modal>
