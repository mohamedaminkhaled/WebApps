<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profile extends Authenticatable
{
    public function user()
    {
        return $this->belongsTo('App\Profile');
    }
    
     protected $fillable = [
        'user_id', 'avatar', 'password','facebook','twitter','github','about'
    ];
     
}
