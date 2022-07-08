<x-app-layout>
    @if (Route::currentRouteName() === 'service/checkout/ys/f')
        <x-slot name="title">
            YoSolidario | {{__('Fundraising platform')}}
        </x-slot>  
        <x-slot  name="seo">
            
        </x-slot>
        <x-slot  name="menu">
            @livewire('menu.navigation-yosolidario', ['code_collection' => $code_collection])
        </x-slot>   
        <div class="mt-0">
         
        </div>
    
    @endif
</x-app-layout>
