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
}
