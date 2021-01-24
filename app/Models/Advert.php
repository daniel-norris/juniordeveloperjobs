<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    /**
     *
     * Get the recruiter that posted the advert.
     *
     */
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

     /**
     *
     * Get all the technology associated with the advert.
     *
     */
    public function tech()
    {
        return $this->morphToMany(Technology::class, 'techable');
    }
}
