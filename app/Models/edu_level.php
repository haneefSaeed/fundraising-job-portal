<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edu_level extends Model
{
    use HasFactory;
    public function job(){
        return $this->hasOne(Job::class);
    }
}