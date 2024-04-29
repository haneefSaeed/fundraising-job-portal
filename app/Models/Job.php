<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function edu_level(){
        return $this->belongsTo(edu_level::class, "edu_lvl_id");
    }
    public function exp_level(){
        return $this->belongsTo(exp_level::class, "exp_lvl_id");
    }

    public function company_size(){
        return $this->belongsTo(company_size::class, "comp_size_id");
    }
    public function category(){
        return $this->belongsTo(categories::class, "cat_id");
    }
    public function company_profile(){
        return $this->belongsTo(company_profile::class, 'comp_profile_id');
    }
    public function emp_type(){
        return $this->belongsTo(emp_type::class, 'emp_type_id');
    }
}
