<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PUBLISHED = 'published';
    const STATUS_SPAM = 'spam';

    protected $fillable = [
        'email', 'title', 'description', 'status'
    ];
}
