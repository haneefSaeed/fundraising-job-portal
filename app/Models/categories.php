<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function cause(){
        return $this->hasOne(causes::class);
    }
    public function blog(){
        return $this->hasOne(Blog::class);
    }

    public function job(){
        return $this->hasOne(Job::class);
    }

    public function transactions(){
        return $this->hasOne(transactions::class);
    }
}
