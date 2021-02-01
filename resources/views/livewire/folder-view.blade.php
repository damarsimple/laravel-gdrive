<div>

    <!-- modal div -->
    <div class="mt-6" x-data="{ open: false }">

        <!-- Button (blue), duh! -->
        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Upload</button>
        <!-- Dialog (full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open">

            <!-- A basic modal dialog with title, body and one button to close -->
            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Upload File to {{ $folder->name ?? "Root"}}
                    </h3>
                    <div class="mt-2" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <form autocomplete="off" wire:submit.prevent="save">
                            <input type="file" wire:model="ufile"> @error('photo') <span class="error">{{ $message }}</span> @enderror
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                                <small x-text="progress"></small>%
                            </div>
                            <button class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">Save to uploaded file to drive</button>
                        </form>
                    </div>
                </div>
                <!-- One big close button.  --->
                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full rounded-md shadow-sm">
            <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
              Close Upload Window
            </button>
          </span>
                </div>

            </div>
        </div>
    </div>

    <!-- modal div -->
    <div class="mt-6" x-data="{ open: false }">

        <!-- Button (blue), duh! -->
        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Create New Folder</button>
        <!-- Dialog (full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open">
            <!-- A basic modal dialog with title, body and one button to close -->
            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Create a new folder
                    </h3>
                    <div class="mt-2">
                        <form wire:submit.prevent="createFolder">
                            <input type="text" wire:model="newFolderName"> @error('newFolderName') <span class="error">{{ $message }}</span> @enderror
                            <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">Create Folder</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @switch($mode) @case('table')
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
                    @for($i = 0; $i
                    < 1000; $i++) <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                        <td class="px-4 py-4"><i class="fa fa-file" aria-hidden="true"></i> app.css

                        </td>
                        <td class="px-4 py-4">15/01/2020 13.52</td>
                        <td class="px-4 py-4">css</td>
                        <td class="px-4 py-4">10 KB</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>



        @break @case('card')
        <h3 class="font-bold m-5">My Drive > @foreach($obj as $f) {{ $f['name'] }} > @endforeach @if(!empty($folder->name)) {{ $folder->name ?? ""}} @endif

        </h3>
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-3 mr-3">
            @foreach($folders as $folder)
            <button wire:click="changePath({{ $folder->id }})">  @include('card/folder-card', ['folder' => $folder])</button> @endforeach
        </div>
        <h3 class="font-bold m-5">Files</h3>
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-3 mr-3">
            @foreach($files as $file) @include('card/file-card', ['file' => $file]) @endforeach
        </div>
        @break @default
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
            <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full h-screen">
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