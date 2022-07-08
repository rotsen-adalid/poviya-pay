
@props(['style', 'on' => 'on', ])

<div x-data="{ shown: false, timeout: null, style: 'success'}"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 3000);  })"
    x-show.transition.opacity.out.duration.1500ms="shown"
    style="display: none;"
    class="fixed w-full bg-opacity-100 bg-indigo-500"
    :class="{ 'bg-indigo-500': style == 'success', 'bg-red-700': style == 'danger', 'bg-gray-500': style != 'success' && style != 'danger' }"
    >
    <!--  @@entangle('style') -->
    <div class="max-w-screen-xl px-3 py-2 mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <div class="flex items-center flex-1 w-0 min-w-0">
                <span class="flex p-2 rounded-lg bg-indigo-600">
                    <span class="text-white material-icons-outlined ">check_circle</span>
                </span>
                <p class="ml-3 text-base font-medium text-white truncate" >
                    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
                </p>
            </div>

            <div class="flex-shrink-0 sm:ml-3">
                <button
                    type="button"
                    x-on:click="shown = false"
                    class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition ease-in-out duration-150
                    hover:bg-indigo-600 focus:bg-indigo-600 ">
                    <span class="text-white material-icons-outlined">clear</span>
                </button>
            </div>
        </div>
    </div>
</div>
