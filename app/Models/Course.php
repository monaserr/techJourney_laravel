<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resource;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'course_id');
    }
}