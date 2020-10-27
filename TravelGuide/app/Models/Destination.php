<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    
     /**
     * Get the places for the destination.
     */
    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }
}
