<div class="overflow-hidden bg-white border border-b-8 shadow-md border-gray-50 sm:rounded-lg">
    @if (isset($head_option))
        <div class="flex-col items-center justify-between block p-4 space-y-2 sm:flex sm:flex-row sm:space-x-2 sm:space-y-0 ">
            {{ $head_option }}
        </div>
    @endif
    <div class="flex flex-col mt-1">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{$thead}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{$tbody}}
                </tbody>
                </table>
                @if (isset($paginate))
                    <div class="mx-6 mt-2 mb-5">
                        {{$paginate}}
                    </div>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>