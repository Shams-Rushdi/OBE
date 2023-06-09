<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function workshops(){
        return $this->hasMany(Workshop::class,'workshop_category_id');
    }

}
