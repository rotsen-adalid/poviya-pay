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
        <x-slot name="seo">
            @php($device_fingerprint_id = 'pv'.date("md") . date("His").date("Y"))
            <script type="text/javascript" src="https://h.online-metrix.net/fp/tags.js?org_id=k8vif92e&session_id=redenlace_418269{{$device_fingerprint_id}}"></script>  
        </x-slot>   
        <div class="mt-0">
            @livewire('yosolidario.fundraising.register-fundraising-yosolidario', ['code_collection' => $code_collection, 'device_fingerprint_id' => $device_fingerprint_id])
        </div>
    
    @endif
</x-app-layout>
