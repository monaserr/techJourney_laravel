<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrackEnrollment extends Model
{
    use HasFactory;

    protected $table = 'course_enrollments';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class, 'course_id');
    }
}