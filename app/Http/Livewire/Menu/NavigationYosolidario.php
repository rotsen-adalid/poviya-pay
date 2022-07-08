<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Http\Traits\Utilities;

class NavigationYosolidario extends Component
{
    use Utilities;
    
    public $payment_order;

    public function mount($code_collection)
    {   dd($this->httpHostYoSolidario());
        // user
        $responsePaymentOrder = Http::post($this->httpHostYoSolidario().'/api/payment_order/petition/code_collection',[
            'code_collection' => $code_collection
            ]);
        $this->payment_order =  $responsePaymentOrder->json(); dd($this->payment_order);
    }

    public function render()
    {
        return view('livewire.menu.navigation-yosolidario');
    }
}
