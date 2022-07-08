<div class="flex flex-col items-center justify-center min-h-screen pt-0 sm:pt-0">

    <div class="w-full px-6 py-4 mt-0 overflow-hidden bg-white border border-gray-100 shadow-md sm:max-w-md sm:rounded-lg">
        <div class="flex justify-center items-center ">
            <x-authentication-card-logo />
        </div>
        <div class="mt-2">
            {{ $slot }}
        </div>
    </div>
    <div class="flex justify-center flex-wrap mt-5">
        <div class="text-sm text-gray-600 text-center">
            © Copyright 2022 POVIYA Inc. {{ __('All Rights Reserved.') }}
        </div>
    </div>
</div>
