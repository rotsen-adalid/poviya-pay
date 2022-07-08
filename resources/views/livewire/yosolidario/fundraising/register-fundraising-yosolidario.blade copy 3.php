<div><img src="" alt="">
    <div class="mt-0 sm:mt-0"> <!-- fbf8f6 -->
        <!-- -->
        <div class="max-w-5xl px-4 py-4 mx-auto sm:py-10 sm:px-2">
            <div class="gap-8 md:grid md:grid-cols-3">
    
                <div class="mt-5 sm:mt-0">
                    <div class="border border-gray-100 shadow-xl sm:rounded-md sm:overflow-hidden">
                        <div class="p-5 space-y-6 bg-white sm:px-8 sm:pt-8 sm:pb-8 ">
                    <!-- card -->
    
                    <div  class="">
                        <div class="mb-4 font-bold uppercase">
                            {{__('Payment method')}}
                        </div>
    
                        <div class="flex flex-col justify-center space-y-2 sm:flex-col sm:space-y-2">
                            <div class="items-center hidden space-x-2">
                                <input wire:model="payment_method_ys" name="payment_method_ys" type="radio" value="CASH"
                                class="w-5 h-5 text-red-600 border-red-500 rounded-full shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                                <div class="flex justify-between w-full">
                                    <div>
                                        <div class="text-base font-bold">{{__('Cash payment')}}</div>
                                        <div class="">+1800 {{__('Payment points, Banks, Pharmacies, Commercial premises, etc')}}</div>
                                    </div>
                                    <div class="flex space-x-1">
                                        <span class="material-icons-outlined">account_balance</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center py-2 space-x-2 border-t border-gray-100">
                                <x-radio wire:model="payment_method_ys" name="payment_method_ys" type="radio" value="CARD_CYBERSOURCE" />
                                <div class="flex justify-between w-full">
                                    <div>
                                        <div class="font-bold">{{__('Visa Mastercard American Express')}}</div>
                                        <div>{{__('Debit, credit and prepaid')}}</div>
                                    </div>
                                    <div class="flex space-x-1">
                                        <span class="material-icons-outlined">credit_card</span>
                                    </div>
                                </div>
                            </div>
                            <div class="items-center hidden py-2 space-x-2 border-t border-gray-100">
                                <input wire:model="payment_method_ys" name="payment_method_ys" type="radio" value="MOBILE_WALLET"
                                class="w-5 h-5 text-red-600 border-red-500 rounded-full shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                                <div>
                                    <div class="font-bold">{{__('Mobile wallet')}}</div>
                                    <div>{{__('TigoMoney, SoliPagos PagoFacil ')}}</div>
                                </div>
                            </div>
                            <div class="items-center hidden py-2 space-x-2 border-t border-gray-100">
                                <input wire:model="payment_method_ys" name="payment_method_ys" type="radio" value="QR_PAYMENT"
                                class="w-5 h-5 text-red-600 border-red-500 rounded-full shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                                <div>
                                    <div class="font-bold">{{__('QR Payment')}}</div>
                                    <div>{{__('QR bank transfer')}}</div>
                                </div>
                            </div>
                        </div>
    
                        <x-input-error for="payment_method" class="mt-2 text-center" />
                    </div>
    
                    <!-- FORM CARD -->
                    @if ($payment_method_ys == 'CARD_CYBERSOURCE')
                    
                    <div class="w-full">
                        <x-label for="name" class="font-bold" value="{{__('Card number')}}" required/>
                        <x-input id="card_number" type="text" class="block w-full mt-1" wire:model.debounce.500ms="card_number"  autocomplete="off" minlength="16" maxlength="18" /> <!-- wire:keyup="generateSlug"  -->
                        @error('card_number')
                            <p class="flex items-center pt-2 space-x-1 text-sm text-red-600">
                                <span class="text-base material-icons-outlined">error_outline</span>
                                <span>{{__('Invalid')}}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="flex space-x-2">
                        <div class="w-full">
                            <x-label for="lastname" class="font-bold" value="{{__('Expiration month')}}" required/>
                            <x-select class="block w-full" id="card_mm" name="card_mm" wire:model.debounce.500ms="card_mm">
                                <x-slot name="option">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </x-slot>
                            </x-select>
                            @error('card_mm')
                                <p class="flex items-center pt-2 space-x-1 text-sm text-red-600">
                                    <span class="text-base material-icons-outlined">error_outline</span>
                                    <span>{{__('Invalid')}}</span>
                                </p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="lastname" class="font-bold" value="{{__('Expiration year')}}" required/>
                            <x-select class="block w-full" id="card_yy" name="card_yy" wire:model.debounce.500ms="card_yy">
                                <x-slot name="option">
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2032</option>
                                    <option value="2031">2033</option>
                                    <option value="2031">2034</option>
                                    <option value="2031">2035</option>
                                </x-slot>
                            </x-select>
                            @error('card_yy')
                                <p class="flex items-center pt-2 space-x-1 text-sm text-red-600">
                                    <span class="text-base material-icons-outlined">error_outline</span>
                                    <span>{{__('Invalid')}}</span>
                                </p>
                            @enderror
                        </div>
                    </div>
    
                    <div class="w-3/6">
    
                        <x-label for="lastname" class="font-bold" value="{{__('Security code')}}" required/>
                        <x-input id="card_cvn" type="text" class="block w-full mt-1" wire:model.debounce.500ms="card_cvn"  maxlexmaxlength="3" autocomplete="off" placeholder="" /> <!-- wirekeyup="generateSlug"  -->
                        @error('card_cvn')
                            <p class="flex items-center pt-2 space-x-1 text-sm text-red-600">
                                <span class="text-base material-icons-outlined">error_outline</span>
                                <span>{{__('Invalid')}}</span>
                            </p>
                        @enderror
                    </div> 
                    <div class="flex justify-center">
                        <img src="{{asset('images/redenlace2.png')}}" alt="" class="w-auto h-14 sm:h-14 sm:w-auto">
                    </div>
                    @endif
    
                    @if ($formInfo)
                        <div class="px-4 py-0 text-center sm:px-6 ">
                            <x-button wire:click="pay" wire:loading.attr="disabled" class="px-4 py-2 mt-5 mb-5 text-base">
                                {{__('Pay now')}}
                            </x-button>
                        </div>
                    @endif
                    
                    @if ($formCard)
                        <!--- CARD SEND -->
                        <form class="px-4 py-2 text-center sm:px-6" id="payment_confirmation" 
                        action="https://secureacceptance.cybersource.com/silent/pay" method="post">
                            
                            @foreach ($this->params as $name => $value)
                                <input type="hidden" id="{{$name}}" name="{{$name}}" value="{{$value}}">
                            @endforeach
                    
                                <input type="hidden" id="signature" name="signature" value="{{$this->signInput}}">
                                <div class="flex items-center justify-center py-5 space-x-1">
                                    <span class="text-base text-red-600 material-icons-outlined">error_outline</span>
                                    <span>{{__('Confirm to make the transaction')}}</span>
                                </div>
    
                                <input type="hidden" name="card_type" value="{{$this->card_type}}"> <!-- 001 visa, 002 mastercad-->
                                <input type="hidden" name="card_number" value="{{$this->card_number}}">
                                <input type="hidden" name="card_expiry_date" value="{{$this->card_expiry_date}}">
                                <input type="hidden" name="card_cvn" value="{{$this->card_cvn}}">
                                
                            <div class="flex justify-center space-x-2">
                                <div wire:click="cancelTrasaction" wire:loading.attr="disabled" class="inline-flex items-center px-5 py-2 text-base font-bold tracking-widest text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-200 rounded-md shadow-md cursor-pointer hover:text-gray-700 active:bg-primary-500 focus:outline-none focus:border-primary-500 focus:shadow-outline-gray disabled:opacity-25">
                                    {{__('Cancel')}}
                                </div>
                                <x-button  class="px-5 py-2 text-base"> <!-- wire:click="transaction" -->
                                    {{__('Transaction')}}
                                </x-button>
                            </div>
                        </form>
                        <!--- END CARD SEND -->
                    @endif
                    <!-- end card -->
    
                    <div class="">
                        <div class="block text-sm font-medium text-gray-800">
                            {{__('By continuing, you agree to Poviya terms and accept our privacy statement.')}}
                        </div>
                    </div>
                    
                    <div class="hidden sm:block">
                        <div class="py-1">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                </div>
    
                    <div class="mt-5 flex justify-end">
                       <div>
                            <div class="mb-2 font-bold uppercase flex space-x-2 items-center">
                                <span class="material-icons-outlined">lock</span>
                                {{__('Protected payment')}}
                            </div>
                       </div>
                    </div>
                    
                    </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-0">
                    <div class="border border-gray-100 shadow-xl sm:rounded-md sm:overflow-hidden">
                        <div class="p-5 space-y-6 bg-white sm:px-8 sm:pt-8 sm:pb-8 ">
                        <!-- card -->
                        <div class="mt-2 font-bold leading-6 text-gray-900 uppercase sm:mt-0">
                            {{__('Your donation')}}
                        </div>
                        <div class="py-5 border-b border-gray-200">
                            <div class="flex justify-between text-base text-gray-600">
                                <span>{{__('Your donation')}}</span>
                                @if ($this->amount_pay)
                                    <span>{{ number_format($this->amount_pay, 2 ) }}
                                        {{$this->money_pay['currency_iso']}}
                                    </span>
                                @else
                                    <span>0.00
                                        {{$this->money_pay['currency_iso']}}
                                    </span>
                                @endif
                                
                            </div>
                            <div class="flex justify-between pt-2 text-gray-600">
                                <span>{{__('YoSolidario tip')}}</span>
                                <span>0.00
                                    {{$this->money_pay['currency_iso']}}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between pt-2 text-base font-semibold">
                                <span>{{__('Total due today')}}</span>
                                <span>{{ number_format($this->total_pay, 2 ) }}
                                    {{$this->money_pay['currency_iso']}}
                                </span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function validar(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
            if (tecla==44) return true; //Coma ( En este caso para diferenciar los decimales )
            if (tecla==48) return true;
            if (tecla==49) return true;
            if (tecla==50) return true;
            if (tecla==51) return true;
            if (tecla==52) return true;
            if (tecla==53) return true;
            if (tecla==54) return true;
            if (tecla==55) return true;
            if (tecla==56) return true;
            patron = /1/; //ver nota
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
    
        function validarOther(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
            if (tecla==44) return true; //Coma ( En este caso para diferenciar los decimales )
            if (tecla==48) return true;
            if (tecla==49) return true;
            if (tecla==50) return true;
            if (tecla==51) return true;
            if (tecla==52) return true;
            if (tecla==53) return true;
            if (tecla==54) return true;
            if (tecla==55) return true;
            if (tecla==56) return true;
            patron = /1/; //ver nota
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
    </script>
</div>