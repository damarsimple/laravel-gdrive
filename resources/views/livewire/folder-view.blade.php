<div>
    @switch($mode)
        @case('table')
            <div class="bg-white pb-4 px-4 rounded-md w-full">
                <div class="overflow-x-auto mt-6">
    
                    <table class="table-auto border-collapse w-full">
                        <thead>
                            <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                                <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Name</th>
                                <th class="px-4 py-2 " style="background-color:#f8f8f8">Date modified</th>
                                <th class="px-4 py-2 " style="background-color:#f8f8f8">Type</th>
                                <th class="px-4 py-2 " style="background-color:#f8f8f8">Size</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-normal text-gray-700">
                            @for($i = 0; $i < 1000; $i++)
                                <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                    <td class="px-4 py-4"><i class="fa fa-file" aria-hidden="true"></i>
    
                                        app.css</td>
                                    <td class="px-4 py-4">15/01/2020 13.52</td>
                                    <td class="px-4 py-4">css</td>
                                    <td class="px-4 py-4">10 KB</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
    
    
    
                @break
            @case('card')
                <h3 class="font-bold m-5">Folders</h3>
                <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mr-3">
                    @for($i = 0; $i < 12; $i++)
                        @include('card/folder-card')
                    @endfor
                </div>
                <h3 class="font-bold m-5">Files</h3>
                <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mr-3">
                    @for($i = 0; $i < 12; $i++)
                        @include('card/file-card')
                    @endfor
                </div>
                @break
            @default
            <table class="text-left w-full">
                <thead class="bg-black flex text-white w-full">
                    <tr class="flex w-full mb-4">
                        <th class="p-4 w-1/4">Name</th>
                        <th class="p-4 w-1/4">Date modified</th>
                        <th class="p-4 w-1/4">Type</th>
                        <th class="p-4 w-1/4">Size</th>
                    </tr>
                </thead>
                <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                <tbody
                    class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full h-screen">
                    <tr class="flex w-full mb-4">
                        <td class="p-4 w-1/4">bruh.jpg</td>
                        <td class="p-4 w-1/4">15/10/2021 13.58</td>
                        <td class="p-4 w-1/4">JPEG</td>
                        <td class="p-4 w-1/4">10MB</td>
                    </tr>
                </tbody>
            </table>
    @endswitch
</div>
