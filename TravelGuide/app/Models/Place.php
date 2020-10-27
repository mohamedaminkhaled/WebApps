<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    
    /**
     * Get the destination that owns the place.
     */
    public function destination()
    {
        return $this->belongsTo('App\Models\Destination');
    }
    
    /**
     * Get the reservations for the place.
     */
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
