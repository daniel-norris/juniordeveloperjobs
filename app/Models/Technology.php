<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    /**
     *
     * Get all the companies assigned this technology.
     *
     */
    public function companies()
    {
        return $this->morphedByMany(Company::class, 'techable');
    }

    /**
     *
     * Get all the adverts assigned this technology.
     *
     */
    public function adverts()
    {
        return $this->morphedByMany(Advert::class, 'techable');
    }

     /**
     *
     * Get all the recruiters assigned this technology.
     *
     */
    public function recruiters()
    {
        return $this->morphedByMany(Recruiter::class, 'techable');
    }
}
