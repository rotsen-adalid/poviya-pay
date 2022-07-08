<div {{ $attributes->merge(['class'=> '@if (isset($description)) max-w-5xl @else max-w-4xl @endif px-0 mx-auto my-10 sm:px-0']) }}>
    <div class="md:gap-10 md:grid md:grid-cols-3">
        <div {{ $attributes->merge(['class'=> '@if (isset($description)) md:col-span-2 @else md:col-span-3 @endif']) }}>
            <div class="px-5 py-10 border border-gray-100 shadow-md sm:px-16 sm:rounded-md sm:overflow-hidden">
                {{$form}}
            </div>
            @if (isset($description))
            <div class="md:col-span-1">
                {{$description}}
            </div>
            @endif
        </div>
    </div>
</div>