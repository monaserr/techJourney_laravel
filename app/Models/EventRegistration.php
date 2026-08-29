<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    public $timestamps = false;

    protected $table = 'event_registrations';

    protected $fillable = [
        'user_id',
        'event_id',
    ];
}