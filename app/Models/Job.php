<?php

namespace App\Models;

use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','job_title','description','job_location','contact_email','web_url','phone','deadline','salary','image'];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }

    public function jobCategory(){
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
