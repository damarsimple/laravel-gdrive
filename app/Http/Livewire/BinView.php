<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BinView extends Component
{
    public function render()
    {
        $files =  User::find(Auth::user()->id)->files()->onlyTrashed();

        return view('livewire.bin-view', ['files' => $files]);
    }
}
