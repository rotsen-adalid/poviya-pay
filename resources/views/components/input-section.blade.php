@if (isset($description_left))
<div {{ $attributes->merge(['class'=> 'max-w-5xl px-0 mx-auto sm:px-0']) }}>
    <div class="md:gap-10 md:grid md:grid-cols-3">
        <div class="mb-4 md:mb-0 md:col-span-1">
            <div class="p-4 bg-white border border-gray-100 rounded-md shadow-md">
                {{$description_left}}
            </div>
        </div>
        <div class="md:col-span-2">
            <div class="px-5 py-10 border border-gray-100 shadow-md sm:px-16 sm:rounded-md sm:overflow-hidden">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
@elseif (isset($description_right))
<div {{ $attributes->merge(['class'=> 'max-w-5xl px-0 mx-auto sm:px-0']) }}>
    <div class="md:gap-10 md:grid md:grid-cols-3">
        <div class="md:col-span-2">
            <div class="px-5 py-10 border border-gray-100 shadow-md sm:px-16 sm:rounded-md sm:overflow-hidden">
                {{$slot}}
            </div>
        </div>
        <div class="mt-4 md:mt-0 md:col-span-1">
            <div class="p-4 bg-white border border-gray-100 rounded-md shadow-md">
                {{$description_right}}
            </div>
        </div>
    </div>
</div>
@else 
<div {{ $attributes->merge(['class'=> 'max-w-2xl px-0 mx-auto sm:px-0']) }}>
    <div class="md:gap-10 md:grid md:grid-cols-3">
        <div class= "md:col-span-3">
            <div class="px-5 py-10 border border-gray-100 shadow-md sm:px-16 sm:rounded-md sm:overflow-hidden">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
@endif