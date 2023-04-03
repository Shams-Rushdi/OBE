<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'location', 'start_date', 'end_date', 'duration', 'organizer'];

    public function speaker() {
        return $this->hasMany(Speaker::class,'workshop_id');
    }

    public function workshopCategory(){
        return $this->belongsTo(WorkshopCategory::class, 'workshop_category_id');
    }
}
