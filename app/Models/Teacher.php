<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function classes() {
        return $this->hasMany(ClassRoom::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
