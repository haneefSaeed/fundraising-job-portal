<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class causes extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function category(){
        return $this->belongsTo(categories::class, 'cause_cat_id');
    }

    public function fr_profile(){
        return $this->belongsTo(fr_profile::class, 'cause_frp_id');
    }

    public function followup(){
        return $this->hasMany(followup::class);
    }
    public function donor(){
        return $this->hasOne(donations::class);
    }
}

