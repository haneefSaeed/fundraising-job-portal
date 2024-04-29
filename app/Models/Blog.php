<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user(){
        return $this->belongsTo(admin::class, "user_id");
    }
public function cat(){
        return $this->belongsTo(categories::class, "cat_id");
}
}
