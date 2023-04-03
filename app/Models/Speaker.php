<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'bio','speaker_image','workshop_id'];

    public function workshop() {
        return $this->belongsTo(Workshop::class,'workshop_id');
    }
}
