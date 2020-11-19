<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
