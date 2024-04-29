<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function category(){
        return $this->belongsTo(categories::class, 'trans_cat_id');
    }

    public function user(){
        return $this->belongsTo(admin::class, "trans_user_id");
    }

}