<div {{ $attributes->merge(['class' => ''])}}>
     <!-- Page Heading -->
    
    @if (isset($header))
        <div>
            {{ $header }}
        </div>
    @endif
    <div class="max-w-6xl px-0 py-4 mx-auto sm:py-10 sm:px-4 lg:px-4">
        {{$slot}}
    </div>
</div>