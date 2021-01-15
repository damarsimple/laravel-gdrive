<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }
}
