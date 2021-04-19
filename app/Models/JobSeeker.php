<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
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
        'country',
        'street',
        'city',
        'state',
        'zip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
