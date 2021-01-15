<div>
<div class="grid grid-cols-2 md:grid-cols-6 gap-3 mr-3">
            @foreach($files as $file)
                @include('card/file-card' , ['file' => $file])
            @endforeach
        </div>
</div>
