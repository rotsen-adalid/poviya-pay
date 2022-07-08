@props(['submit'])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="w-full mt-5">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="overflow-hidden ">
                <div class="px-0 py-0 bg-white sm:p-0">
                    <div class="space-y-4">
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                    <div class="flex items-center justify-center p-3 px-4 space-x-2 text-right bg-white sm:px-6">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
