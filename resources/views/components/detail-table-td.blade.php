@props(['label', 'container'])
<tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
    <td class="px-2 py-4 sm:px-6">
        <div class="flex justify-start w-24 sm:w-full">
            <div class="ml-0">
                <div class="flex text-sm font-medium text-gray-900 sm:truncate">
                    <span>{{$label}}</span>
                    <span>:</span>
                </div>
            </div>
        </div>
    </td>
    <td class="px-2 py-4 sm:px-6">
        <div class="flex justify-start w-64 sm:w-full">
            <div class="ml-0">
                <div class="text-sm font-normal text-gray-900">
                    {{$container}}
                </div>
            </div>
        </div>
    </td>
</tr>
