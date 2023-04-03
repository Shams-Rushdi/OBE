<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() 
    {
        return $this->hasMany(User::class,'membership_id', 'id');
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
