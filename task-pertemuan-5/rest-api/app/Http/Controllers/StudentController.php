<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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
        
        ## REQUIRED
        // Student::where('id', $id)->update([
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ]);
        
        $student = Student::find($id);

        $student->nama = $request->input('nama') ?? $student->nama;
        $student->nim = $request->input('nim') ?? $student->nim;
        $student->email = $request->input('email') ?? $student->email;
        $student->jurusan = $request->input('nama') ?? $student->jurusan;

        $student->save();
        
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
