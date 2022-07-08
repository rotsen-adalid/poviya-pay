<div>
    <div class="hidden lg:block max-w-6xl px-4 mx-auto md:px-4 lg:px-4  py-6">
        <div class="grid grid-cols-5 gap-4  bg-white shadow-lg rounded-lg">
            <div class="flex flex-col border-r py-5 px-4">
                {{$menu}}
            </div>
            <div class="col-span-4 py-5 pr-4">
                <div class="sm:mt-0">
                    {{$container}}
                </div>
            </div>
        </div>
    </div>
    <div class="lg:hidden">
        <div class="flex flex-col border-r ">
            {{$menu}}
        </div>
        <div class="">
            <div class="sm:mt-0 px-4">
                {{$container}}
            </div>
        </div>
    </div>
</div>

