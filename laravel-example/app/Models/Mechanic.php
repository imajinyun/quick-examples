<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function carOwner()
    {
        return $this->hasOneThrough(
            'App\Models\Owner',
            'App\Models\Car',
            'mechanic_id', // Foreign key on cars table...
            'car_id', // Foreign key on owners table...
            'id', // Local key on mechanics table...
            'id' // Local key on cars table...
        );
    }
}
