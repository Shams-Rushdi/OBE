<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guard_name = 'web';
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['name']??false) {
            $query->where('name', 'like', '%'.request('name').'%');

        }
        if ($filters['department_id']??false) {
            $query->where('department_id', 'like', '%'.request('department_id').'%');

        }
        if ($filters['batch_id']??false) {
            $query->where('batch_id', 'like', '%'.request('search').'%');
        }
        if ($filters['student_id']??false) {
            $query->where('student_id', 'like', '%'.request('search').'%');
        }
    }

    public function jobApp()
    {
        return $this->hasMany(JobApplication::class, 'user_id');
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'membership_id', 'id');
    }
    
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
