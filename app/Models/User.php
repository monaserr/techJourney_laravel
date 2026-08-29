<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CourseEnrollment;
use App\Models\Track;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // ================= ROLE =================

    public function isInstructor()
    {
        return $this->role === 'instructor';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }


    // ================= COURSE ENROLLMENTS =================

    public function trackEnrollments(): HasMany
    {
        return $this->hasMany(
            CourseEnrollment::class,
            'user_id'
        );
    }

    public function enrolledTracks()
    {
        return $this->belongsToMany(
            Track::class,
            'course_enrollments',
            'user_id',
            'course_id'
        );
    }

    public function bookedEvents()
{
    return $this->belongsToMany(
        Event::class,
        'event_registrations',
        'user_id',
        'event_id'
    );
}

public function fullName()
{
    return trim($this->first_name.' '.$this->last_name);
}

public function initials()
{
    return strtoupper(substr($this->first_name, 0, 1).substr($this->last_name, 0, 1));
}

public function events()
{
    return $this->hasMany(Event::class, 'instructor_id');
}
}