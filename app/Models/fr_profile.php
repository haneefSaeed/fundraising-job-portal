<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fr_profile extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, "frp_user_id");
    }
    public function company_profile(){
        return $this->belongsTo(company_profile::class, "comp_id");
    }
   public function cause(){
        return $this->hasOne(causes::class);
   }
}
