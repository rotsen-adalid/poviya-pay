<x-app-layout>
    
    @if (Route::currentRouteName() === 'home')
        <x-slot name="title">
            Poviya | {{__('Service pay')}}
        </x-slot>  
        <x-slot  name="seo">
            
        </x-slot>
        <x-slot  name="menu">
        
        </x-slot>   
        <div class="mt-0">
        
        </div>

    @elseif (Route::currentRouteName() === 'service/checkout/ys/f')
        <x-slot name="title">
            {{__('Pay transaction')}}
        </x-slot>  
        <x-slot  name="seo">
            
        </x-slot>
        <x-slot  name="menu">
            @livewire('menu.navigation-yosolidario', ['code_collection' => $code_collection])
        </x-slot>
        <x-slot name="seo">
            @php($device_fingerprint_id = 'pv'.date("md") . date("His").date("Y"))
            <script type="text/javascript" src="https://h.online-metrix.net/fp/tags.js?org_id=k8vif92e&session_id=redenlace_418269{{$device_fingerprint_id}}"></script>  
        </x-slot>   
        <div class="mt-0">
            @livewire('yosolidario.fundraising.register-fundraising-yosolidario', ['code_collection' => $code_collection, 'device_fingerprint_id' => $device_fingerprint_id])
        </div>

    @elseif (Route::currentRouteName() === 'cybersource/receipt')
        <x-slot name="title">
            {{__('Close to purchase')}}
        </x-slot>
        <x-slot  name="menu">
            @livewire('menu.navigation-checkout')
        </x-slot>
        <x-slot name="seo">
            
        </x-slot>
        
    @endif
</x-app-layout>
