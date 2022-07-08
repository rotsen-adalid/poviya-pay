<nav x-data="{ open: false }" class=" top-0 w-full bg-white border-b border-gray-100 shadow-sm header">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl px-4 mx-auto md:px-4 lg:px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center ">
                    <a href="https://www.yosolidario.com">
                        <x-application-mark-yosolidario/>
                    </a>
                </div>

                <!-- Navigation Links -->
                
            </div>
            
            <div class="hidden lg:flex sm:items-center sm:ml-6">
                @if ($this->payment_order->count() > 0)
                    @if ($this->payment_order['error'] == 1)
                        <p class="text-sm font-bold mt-2 pt-1 mb-0 space-x-2 text-gray-800">
                            <div>{{$this->payment_order['data']['user']['name'] .' '. $this->payment_order['data']['user']['lastname']}}</div>
                        </p>    
                    @endif
                @else
                <p class="text-sm font-semibold mt-2 pt-1 mb-0 space-x-2">
                    <span>{{__('Don\'t have an account?')}}</span>
                    <a class=" font-bold text-gray-600 underline hover:text-gray-900" href="https://www.yosolidario.com/register">
                        {{ __('Create Account') }}
                    </a>
                </p>
                @endif

              </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-600 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        
    </div>
</nav>