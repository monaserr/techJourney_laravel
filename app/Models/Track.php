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

    public function categorySlug()
    {
        $title = strtolower($this->title);

        return match (true) {
            str_contains($title, 'front') => 'frontend',
            str_contains($title, 'back') => 'backend',
            str_contains($title, 'ai') || str_contains($title, 'machine learning') => 'ai-ml',
            str_contains($title, 'cyber') => 'cybersecurity',
            str_contains($title, 'data') => 'data-science',
            default => 'all',
        };
    }
}