<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_registered',
        'address_1',
        'address_2',
        'city',
        'region',
        'country',
        'postcode',
        'email',
        'phone',
        'url',
        'logo',
    ];

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

    /**
     *
     * Get all the technology associated with the company.
     *
     */
    public function tech()
    {
        return $this->morphToMany(Technology::class, 'techable');
    }
}
