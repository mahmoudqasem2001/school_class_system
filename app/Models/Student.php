<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classes()
    {
        return $this->belongsToMany(ClassRoom::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
