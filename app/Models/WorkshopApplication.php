<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopApplication extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'email',  'workshop_id','application_date','status','name','bkash_number','bkash_transaction','bkash_transaction_image'];

    public function workshop(){
        return $this->belongsTo(Workshop::class);
    }
}


