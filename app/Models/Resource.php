<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Resource extends Model
{
    protected $table = 'resources';

    protected $fillable = [
        'course_id',
        'category',
        'topic',
        'title',
        'description',
        'icon',
        'bg',
        'link',
        'badge',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}