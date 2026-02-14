<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function cause()
    {
        return $this->hasOne(causes::class);
    }
    public function blog()
    {
        return $this->hasOne(Blog::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class, 'cat_id', 'id');
    }

    public function transactions()
    {
        return $this->hasOne(transactions::class);
    }

    public function allJobs()
    {
        return $this->hasManyThrough(
            Job::class,        // Final model
            categories::class, // Intermediate model (subcategories)
            'cat_root',        // Foreign key on subcategories table
            'cat_id',          // Foreign key on jobs table
            'id',              // Local key on root category
            'id'               // Local key on subcategory
        );
    }
    public function children()
    {
        return $this->hasMany(categories::class, 'cat_root', 'id');
    }
}
