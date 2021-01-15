<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FolderView extends Component
{
    public $mode = "card";

    public $path = NULL;

    public function render()
    {
        if($this->path == NULL)
        {
            $folders = User::find(Auth::user()->id)->folders;

            $files =  User::find(Auth::user()->id)->files()->whereNull('folder_id');
        }else{
            $folder = User::find(Auth::user()->id)->folders()->where('name' , $this->path);

            $folders = $folder->subfolders;

            $files =  $folder->files;
        }

        return view('livewire.folder-view', [
            'mode' => $this->mode,
            'folders' => $folders,
            'files' => $files,
            ]);
    }
}
