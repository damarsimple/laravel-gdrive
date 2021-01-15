<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FolderView extends Component
{
    public $mode = "card";

    public $path = "/";

    
    public function render()
    {
        return view('livewire.folder-view', ['mode' => $this->mode]);
    }
}
