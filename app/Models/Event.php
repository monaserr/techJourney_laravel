<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'location',
        'category',
        'price',
        'instructor_id',
    ];

    protected $casts = [
        'event_date' => 'date',
        'price' => 'integer',
    ];
}