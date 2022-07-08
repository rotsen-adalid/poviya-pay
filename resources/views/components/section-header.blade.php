<div {{ $attributes->merge(['class' => ''])}}>
        <div class="flex flex-col max-w-6xl px-2 py-0 mx-auto space-y-0 sm:flex-row sm:justify-between sm:items-center sm:px-4 lg:px-4 sm:space-y-0">
                {{$slot}}
        </div>
</div>