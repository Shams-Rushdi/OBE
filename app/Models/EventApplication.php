<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventApplication extends Model
{
    protected $fillable = ['user_id', 'email',  'event_id','application_date','status','name','bkash_number','bkash_transaction','bkash_transaction_image'];
    use HasFactory;

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
