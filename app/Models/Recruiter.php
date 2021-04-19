<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'forename',
        'middle',
        'surname',
        'user_id',
        'bio',
        'avatar',
        'company_id',
    ];

    /**
     *
     * Get the recruiter's company.
     *
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     *
     * Get the adverts posted by the recruiter.
     *
     */
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

     /**
     *
     * Get all the technology associated with the recruiter.
     *
     */
    public function tech()
    {
        return $this->morphToMany(Technology::class, 'techable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
