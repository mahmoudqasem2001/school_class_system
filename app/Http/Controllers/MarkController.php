<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Mark;
use App\Http\Resources\MarkResource;

class MarkController extends Controller
{
    public function addMarks(Request $request, $studentId, $classId)
    {
        $student = Student::findOrFail($studentId);
        $class = ClassRoom::findOrFail($classId);

        $this->validate($request, [
            'first_term' => 'required|integer',
            'mid_term' => 'required|integer',
            'final_term' => 'required|integer',
        ]);

        $marksData = $request->only(['first_term', 'mid_term', 'final_term']);

        $mark = new Mark($marksData);
        $student->marks()->save($mark);

        return response()->json(['message' => 'Marks added successfully'], 201);
    }

    public function getClassMarks($classId)
    {
        $class = ClassRoom::findOrFail($classId);
        $students = $class->students;
        
        $studentIds = $students->pluck('id');
        $marks = Mark::whereIn('student_id', $studentIds)->where('class_id', $classId)->get();

        return MarkResource::collection($marks);
    }
}
