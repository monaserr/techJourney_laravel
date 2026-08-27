<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Track extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function trackEnrollments()
    {
        return $this->hasMany(TrackEnrollment::class, 'course_id');
    }
}