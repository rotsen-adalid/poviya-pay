<div><img src="" alt="">
    <div class="mt-0 sm:mt-0"> <!-- fbf8f6 -->
        <!-- -->
        <div class="max-w-5xl px-4 py-4 mx-auto sm:py-10 sm:px-2">
            <div class="gap-8 md:grid md:grid-cols-3">
    
                <div class="mt-0 md:mt-0 col-span-2">
                    <div class="border border-gray-100 shadow-xl sm:rounded-md sm:overflow-hidden">
                    <div class="p-5 space-y-6 bg-white sm:px-10 sm:pt-8 sm:pb-8">
    
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
                                        <input type="text" name="amount_pay" id="amount_pay" wire:model.debounce.500ms="amount_pay" onKeyPress="return validar(event)" maxlength="9" autocomplete="off"
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
    
                            <div class="px-4 py-0 text-center sm:px-6 ">
                                <x-button wire:click="pay" wire:loading.attr="disabled" class="px-4 py-3 mt-5 mb-5 text-base">
                                    {{__('Continue')}}
                                </x-button>
                            </div>

                        </div>
                        
                        <div>
                            <div class="">
                                <div class="block text-sm font-medium text-gray-800">
                                    {{__('By continuing, you agree to YoSolidario terms and accept our privacy statement.')}}
                                </div>
                            </div>
                            
                            <div class="hidden sm:block">
                                <div class="py-5">
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