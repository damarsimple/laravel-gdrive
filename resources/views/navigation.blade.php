<ul class="text-center text-xl">
    <a href="/dashboard">
        <li class="{{ Route::current()->getName() == 'dashboard' ? 
            'text-blue-600 bg-blue-200 rounded-r-lg py-2' 
            : 
            'py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg' }}">
            My Drive
        </li>
    </a> <a href="/recent">
        <li class="{{ Route::current()->getName() == 'recent' ? 
            'text-blue-600 bg-blue-200 rounded-r-lg py-2' 
            : 
            'py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg' }}">
            Recent
        </li>
    </a>
    <a href="/shared">
        <li class="{{ Route::current()->getName() == 'shared' ? 
            'text-blue-600 bg-blue-200 rounded-r-lg py-2' 
            : 
            'py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg' }}">
            Shared With Me
        </li>
    </a>
    <a href="/bin">
        <li class="{{ Route::current()->getName() == 'bin' ? 
            'text-blue-600 bg-blue-200 rounded-r-lg py-2' 
            : 
            'py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg' }}">
            Bin
        </li>
    </a>
    <hr>
    <li class="py-2 hover:bg-gray-100 cursor-pointer rounded-r-lg px-3">
        Storage (90%)
        <br> 10 GB of 15 GB used lul
        <div class="shadow w-full bg-grey-light mt-2">
            <div class="bg-red-900 text-xs leading-none py-1 text-center text-white" style="width: 90%">90%</div>
        </div>
    </li>
</ul>
