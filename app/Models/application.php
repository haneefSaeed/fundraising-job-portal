<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prof_prof(){
        return $this->belongsTo(prof_profile::class, 'prof_prof_id');
    }
    public function job(){
        return $this->belongsTo(Job::class, 'vac_id');
    }
}
