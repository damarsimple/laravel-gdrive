<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subfolders()
    {
        return $this->hasMany(Folder::class, 'folder_id');
    }

    public function parentfolder()
    {
        return $this->belongsTo(Folder::class,'folder_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
