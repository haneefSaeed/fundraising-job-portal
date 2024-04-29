<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prof_profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function career(){
        return $this->belongsTo(career_level::class, 'career_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function edu_lvl(){
        return $this->belongsTo(edu_level::class, 'edu_id');
    }

    public function applicant(){
        return $this->hasMany(application::class);
    }
}
