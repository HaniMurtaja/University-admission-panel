<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $guarded = [];

    public function imagePath()
    {
        return url("/storage/images/universities/$this->image");
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
