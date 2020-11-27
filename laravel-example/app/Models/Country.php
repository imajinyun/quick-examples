<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function articles()
    {
        return $this->hasManyThrough(
            'App\Models\Article',
            'App\Models\User',
            'country_id', // Foreign key on users table...
            'user_id', // Foreign key on articles table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
}
