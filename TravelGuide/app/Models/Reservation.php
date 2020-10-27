<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    /**
     * Get the place that owns the reservation.
     */
    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
}
