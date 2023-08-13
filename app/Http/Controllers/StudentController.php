<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Mark;
use Illuminate\Http\Request;

class StudentController extends Controller
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
}
