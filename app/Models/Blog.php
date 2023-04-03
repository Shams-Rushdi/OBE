<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'image', 'video', 'content','category_id'];

    public function blogsCategory() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    
}
