<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Sinh viên không được tìm thấy.'], 404);
        }

        return response()->json($student);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $student = new Student([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
        ]);

        $student->save();

        return response()->json($student, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'dob' => 'required|date',
        ]);

        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Sinh viên không được tìm thấy.'], 404);
        }

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->dob = $request->input('dob');

        $student->save();

        return response()->json($student, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Sinh viên không được tìm thấy.'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Sinh viên đã được xóa thành công.'], Response::HTTP_OK);
    }
}
