<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Str;

class FolderView extends Component
{
    use WithFileUploads;
    
    public $mode = "card";

    public $pathId = null;

    public $folders;

    public $folder;

    public $files;

    public $obj = [];

    public $ufile;

    public $newFolderName = "";

    public function mount()
    {
        if ($this->pathId == null) {
            $folder =  User::find(Auth::user()->id);

            $this->folders = $folder->folders()->whereNull('folder_id')->get();

            $this->files =  $folder->files()->whereNull('folder_id')->get();

            $this->folder = null;
        } else {
            $folder = User::find(Auth::user()->id)->folders()->where('id', $this->pathId)->first();

            $this->folders = $folder->subfolders ?? [];

            $this->files =  $folder->files;
            
            $this->folder = $folder;
        }
    }

    public function createFolder()
    {
        $folder = new Folder();

        if(!$this->folder == null)
        {
            $folder->folder_id = $this->folder->id;
        }

        $folder->name = $this->newFolderName;
        $folder->user_id = Auth::user()->id;
        $folder->save();

        $this->mount();
    }
    public function save()
    {

        $file = new File();
        $file->name = $this->ufile->getClientOriginalName();
        $file->uuid = Str::uuid();
        $file->size = $this->ufile->getSize();
        $file->folder_id = $this->folder->id ?? null;
        $file->user_id = Auth::user()->id;
        $this->ufile->storeAs(Auth::user()->name, $file->uuid);

        $file->mime = mime_content_type($file->file_path);

        $file->save();

        $this->mount();
    }

    public function changePath(int $pathId)
    {
        $this->pathId = $pathId;

        $folder = Auth::user()->folders()->with('files', 'subfolders')->where('id', $this->pathId)->first();

        $this->folders = $folder->subfolders ?? [];

        $this->files =  $folder->files;

        $this->folder = $folder;
       
        if($this->folder != null && $this->folder->parentfolder != null)
            $this->obj[] = $this->folder->parentfolder;

    }
    public function render()
    {
        return view('livewire.folder-view', [
            'mode' => $this->mode,
            'folders' => $this->folders,
            'files' => $this->files,
            ]);
    }
}
