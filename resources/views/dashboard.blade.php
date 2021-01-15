<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Drive > Cool Folder 
        </h2>
    </x-slot>

    <div>
        <div class="py-3">
            <div class="py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-6 gap-5">
                <div class="col-span-1 bg-white">
                @include('navigation')

                </div>
                <div class="col-span-5 bg-white">

                <livewire:folder-view >

                </div>
            </div>
        </div>
    </div>
</x-app-layout>