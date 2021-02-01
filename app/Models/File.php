<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'uuid', 'size','user_id', 'folder_id'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }

    public function getFilePathAttribute()
    {
        return  $this->user->user_drive . "/" . $this->uuid;
    }
    public function getFileContentAttribute()
    {
        return file_get_contents($this->file_path);
    }
}
