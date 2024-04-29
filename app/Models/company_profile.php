<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_profile extends Model
{
    use HasFactory;

    public function job(){
        return $this->hasOne(Job::class);
    }

    public function comp_size(){
        return $this->belongsTo(company_size::class, "comp_size_id");
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function fr_profile(){
        return $this->hasOne(fr_profile::class);
    }
}
