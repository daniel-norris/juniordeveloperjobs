<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * 
     * Get recruiters at company.
     * 
     */
    public function recruiters()
    {
        return $this->hasMany(Recruiter::class);
    }

    /**
     * 
     *  Get all adverts associated with this company.
     * 
     */ 
    public function adverts()
    {
        return $this->hasManyThrough(Advert::class, Recruiter::class);
    }
}
