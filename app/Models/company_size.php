<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_size extends Model
{
    use HasFactory;
    public function company_profile(){
        return $this->hasOne(company_profile::class);
    }
}
