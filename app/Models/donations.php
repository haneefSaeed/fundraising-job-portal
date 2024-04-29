<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donations extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function cause(){
        return $this->belongsTo(causes::class, "cause_id");
    }
}
