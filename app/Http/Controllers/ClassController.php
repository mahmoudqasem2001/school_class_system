<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Resources\MarkResource;
use App\Models\Mark;

class ClassController extends Controller
{
    public function getClassMarks($classId)
{
    $class = ClassRoom::findOrFail($classId);
    $students = $class->students;
    
    $studentIds = $students->pluck('id');
    $marks = Mark::whereIn('student_id', $studentIds)->where('class_id', $classId)->get();

    return MarkResource::collection($marks);
}
}
