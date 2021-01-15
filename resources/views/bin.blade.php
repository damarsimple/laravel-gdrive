<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Drive
        </h2>
    </x-slot>

    <div>
        <div class="py-3">
            <div class="py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-6 gap-5">
                <div class="col-span-1 bg-white">
                    <ul class="text-center text-xl">
                        <li class="text-blue-600 bg-blue-200 rounded-r-lg py-2">
                            My Drive
                        </li>
                        <li class="py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg">
                            Recent
                        </li>
                        <li class="py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg">
                            Shared With Me
                        </li>
                        <li class="py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg">
                            Bin
                        </li>
                        <hr>
                        <li class="py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg px-3">
                            Storage (90%)
                            <br> 10 GB of 15 GB used lul
                            <div class="shadow w-full bg-grey-light mt-2">
                                <div class="bg-red-900 text-xs leading-none py-1 text-center text-white" style="width: 90%">90%</div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="col-span-5 bg-white">

                <livewire:bin-view >

                </div>
            </div>
        </div>
    </div>
</x-app-layout>