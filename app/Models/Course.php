<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'youtube_url'];
    
    public function CourseCategory() {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
}
