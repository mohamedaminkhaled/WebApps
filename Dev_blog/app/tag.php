<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use SoftDeletes;
    
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
