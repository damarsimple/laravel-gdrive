<div>
    @foreach($recents as $key=>$files)
        <h3 class="font-bold m-5">{{ $key }}</h3>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mr-3">
            @foreach($files as $file)
                @include('card/file-card', ['file' => $file])
            @endforeach
        </div>
    @endforeach
</div>
