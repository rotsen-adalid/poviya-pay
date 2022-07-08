<div>
    <x-slot name="title">
        YoSolidario | {{__('Privacy Policy')}} 
    </x-slot>  
    <x-slot name="menu">
        
    </x-slot> 
    <div class="mt-0 sm:mt-0"> <!-- fbf8f6 -->
        <!-- -->
        <div class="max-w-6xl px-4 py-4 mx-auto sm:py-10 sm:px-2">
            <div class="gap-8 md:grid md:grid-cols-2">
    
                <div class="mt-0 md:mt-0">
                    <div class="border border-gray-100 shadow-xl sm:rounded-md sm:overflow-hidden">
                    <div class="p-5 space-y-6 bg-white sm:px-8 sm:pt-8 sm:pb-8">
    
                        <a href="{{ $this->httpHostYoSolidario().'/'.$this->campaign['slug']}}" 
                            class="flex items-center w-auto px-2 py-1 space-x-1">
                            <span class="text-sm material-icons-outlined">arrow_back_ios</span>
                            <span>{{__('Return')}}</span>
                        </a>
    
                        <div class="flex-col items-center hidden space-x-2 sm:flex-row">
                            <div>
                                <img src="{{$this->image}}" alt="" class="object-cover h-20 w-28 sm:h-20 sm:w-24">
                            </div>
                            <div>
                                <div>
                                    <span class="text-base">{{__('Aplicacion')}}</span>
                                    <span class="font-bold">{{$this->title}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- FORM INFO -->
                        <div class="space-y-6">
                            @if ($this->campaignReward->count() > 0)
                                <div class="flex justify-between text-xl border-b border-gray-300">
                                    <div class="mb-4">
                                        <span class="font-bold uppercase">{{__('Total')}}</span>
                                    </div>
                                    <div class="text-red-600">
                                        <span class="font-bold">{{$this->money_pay['currency_iso']}}</span>
                                        <span class="font-bold">{{ number_format($this->amount_pay, 2 ) }}</span>
                                    </div> 
                                    
                                    <x-input-error for="amount_pay" class="mt-2" />
                                </div>
                            @else 
                            <div>
                                <div class="flex justify-center">
                                    <div class="flex rounded-md shadow-sm sm:mx-0">
                                        <span class="inline-flex items-center px-3 text-2xl font-bold text-gray-900 bg-white border border-r-0 border-gray-300 rounded-l-md sm:text-4xl">
                                            {{$this->money_pay['currency_iso']}}
                                        </span>
                                        <input type="text" name="amount_pay" id="amount_pay" wire:model.debounce.500ms="amount_pay" maxlength="9" autocomplete="off"
                                        class="flex-1 block w-full text-2xl font-bold text-right bg-white border-l-0 border-gray-200 shadow-xs rounded-r-md focus:ring focus:ring-gray-50 focus:ring-opacity-50 focus:border-gray-200 sm:text-4xl" placeholder="">
                                        <span class="items-center hidden pr-3 text-2xl font-bold text-gray-900 bg-white border border-l-0 border-gray-300 rounded-r-md sm:text-4xl ">
                                            .00
                                        </span>
                                    </div>
                                </div>
                                
                                <x-input-error for="amount_pay" class="mt-2" />
                            </div>
                            @endif
                           
    
                            <div class="mb-4 font-bold uppercase">
                                {{__('Personal information')}}
                            </div>
    
                            <!-- your nane -->
                            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-2">
                                <div class="w-full">
                                    <x-label for="name" class="font-bold" value="{{ __('Name') }}" required/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="material-icons-outlined">person</span>
                                        </div>
                                        <x-input id="name" type="text" class="block w-full pl-10 mt-1" wire:model.debounce.500ms="name" autocomplete="off"/>
                                    </div>
                                    <x-input-error for="name" class="mt-2" />
                                </div>
                                <div class="w-full">
                                    <x-label for="lastname" class="font-bold" value="{{ __('Lastnames') }}" required/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="material-icons-outlined">person</span>
                                        </div>
                                        <x-input id="lastname" type="text" class="block w-full pl-10 mt-1" wire:model.debounce.500ms="lastname" autocomplete="off"/>
                                    </div>    
                                    <x-input-error for="lastname" class="mt-2" />
                                </div>
                            </div>
        
                            <!-- identification -->
                            <div class="w-full">
                                <x-label for="identification" class="font-bold" value="{{ __('Identification number') }} DNI" required/>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="material-icons-outlined">fingerprint</span>
                                    </div>
                                    <x-input id="identification" type="text" class="block w-full pl-10 mt-1 uppercase" wire:model.debounce.500ms="identification" autocomplete="off"/>
                                </div>
                                <x-input-error for="identification" class="mt-2" />
                            </div>
                            
                            <!-- email -->
                            <div class="w-full">
                                <x-label for="email" class="font-bold" value="{{ __('Your email address') }}"/>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="material-icons-outlined">email</span>
                                    </div>
                                    <x-input id="email" type="text" class="block w-full pl-10 mt-1" wire:model.debounce.500ms="email" autocomplete="off"/>
                                </div>
                                <x-input-error for="email" class="mt-2" />
                            </div>
        
                            <!-- country_id -->
                            <div class="w-full">
                                <x-label for="country_id" class="font-bold" value="{{__('Country')}}" required/>
                                <div class="flex flex-col w-full space-y-4 sm:flex-row sm:space-y-0 sm:space-x-2">
                                    <div class="sm:w-3/6">
                                        <x-select class="block w-full mt-1" id="country_id" name="country_id" wire:model.debounce.500ms="country_id" wire:change="countryStates">
                                            <x-slot name="option">
                                                @foreach ($collection_countries as $item)
                                                    <option value="{{$item['id']}}">{{ __($item['name']) }}</option>
                                                @endforeach
                                            </x-slot>
                                        </x-select>
                                        <x-input-error for="country_id" class="mt-2" />
                                    </div>
                                    <div class="sm:w-3/6">
                                        <x-select class="block w-full mt-1" id="country_state_id" name="country_state_id" wire:model.debounce.500ms="country_state_id">
                                            <x-slot name="option">
                                                <option value="">{{ __('Choose') }}</option>
                                                @foreach ($collection_country_states as $item)
                                                    <option value="{{$item['id']}}">{{ __($item['name']) }}</option>
                                                @endforeach
                                            </x-slot>
                                        </x-select>
                                        <x-input-error for="country_state_id" class="mt-2" />
                                    </div>
                                </div>
                            </div>
        
                            <!-- city -->
                            <div class="w-full">
                                <x-label for="city" class="font-bold" value="{{ __('City') }}" required/>
                                <x-input id="city" type="text" class="block w-full mt-1" wire:model.debounce.500ms="city" autocomplete="off"/>
                                <x-input-error for="city" class="mt-2" />
                            </div>
        
                            <!-- address -->
                            <div class="w-full">
                                <x-label for="address" class="font-semibold" value="{{ __('Address') }}" required/>
                                <x-textarea id="address" class="block w-full mt-1" rows="1" wire:model.debounce.500ms="address" autocomplete="off" minlength="5" maxlength="170"/>
                                <x-input-error for="address" class="mt-2" />
                            </div>
                                                   
                            @if ($country_id <> 1)
                            <!-- postal_code -->
                            <div class="w-full">
                                <x-label for="postal_code" class="font-bold" value="{{ __('Postal Code') }}" required/>
                                <x-input id="postal_code" type="text" class="block w-full mt-1" wire:model.debounce.500ms="postal_code" autocomplete="off"/>
                                <x-input-error for="postal_code" class="mt-2" />
                            </div>
                            @endif
    
                            <!-- country_phone_id -->
                            <div class="w-full">
                                <x-label for="country_phone_id" class="font-bold" value="{{$this->phone_prefix}}"/>
                                <div class="flex flex-col w-full space-y-4 sm:flex-row sm:space-y-0 sm:space-x-2">
                                    <div class="sm:w-3/6">
                                        <x-select class="block w-full mt-1" id="country_phone_id" name="country_phone_id" wire:model.debounce.500ms="country_phone_id" wire:change="countryPrefix">
                                            <x-slot name="option">
                                                @foreach ($collection_countries_phone as $item)
                                                    <option value="{{$item['id']}}">{{ __($item['name']) }}</option>
                                                @endforeach
                                            </x-slot>
                                        </x-select>
                                        <x-input-error for="country_phone_id" class="mt-2" />
                                    </div>
                                    <div class="sm:w-3/6">
                                        <x-input id="phone" type="text" class="block w-full mt-1" placeholder="{{__('Number phone')}}" wire:model.debounce.500ms="phone" autocomplete="off" minlength="8" maxlength="20"  min="0"/>
                                        <x-input-error for="phone" class="mt-2" />
                                    </div>
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
    
                    <div class="flex justify-end mt-5">
                       <div>
                            <div class="flex items-center mb-2 space-x-2 font-bold uppercase">
                                <span class="material-icons-outlined">lock</span>
                                {{__('Protected payment')}}
                            </div>
                       </div>
                    </div>
                    
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>