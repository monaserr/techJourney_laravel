<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title',
    ];

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }
}