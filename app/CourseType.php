<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $table = 'course_type';

    protected $guarded = [];

    public $timestamps = false;

    public function courses(){
        return $this->hasMany(Course::class,'type_id');
    }
}
