<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_SPAM = 3;

    protected $fillable = [
        'email', 'title', 'description', 'status'
    ];
}
