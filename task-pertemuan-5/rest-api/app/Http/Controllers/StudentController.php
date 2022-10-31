<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);
        $data = [
            'message' => 'Student is created successfully',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id) {
        
        Student::where('id', $id)
        ->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);
        
        $student = Student::find($id);
        
        $data = [
            'message' => 'Student is updated successfully',
            'data' => $student
        ];
        return response()->json($data, 200);
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();

        $data = [
            'message' => 'Student is deleted successfully',
            'data' => $student
        ];
        
        return response()->json($data, 200);
    }
}
