<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'designation', 'company_name', 'phone_number', 'email', 'image'];

    public function CommitteeCategory() {
        return $this->belongsTo(CommitteeCategory::class, 'committee_category_id');
    }
}
