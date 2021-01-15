<div>
    @for($x = 0; $x < 12; $x++)
        <h3 class="font-bold m-5">week ago</h3>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mr-3">
            @for($i = 0; $i < 12; $i++)
                @include('card/file-card')
            @endfor
        </div>
    @endfor
</div>
