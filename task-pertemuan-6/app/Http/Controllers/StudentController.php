<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {

        $students = Student::all();

        if ($students) {
            $data = [
                'message' => 'Get all students',
                'data' => $students,
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data students is empty'
            ];
    
            return response()->json($data, 204);
        }

    }
    
    public function store(Request $request) {
        # REQUIRED USING CREATE
        // $input = [
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ];
        // $student = Student::create($input);
        // $data = [
        //     'message' => 'Student is created successfully',
        //     'data' => $student
        // ];
        // return response()->json($data, 201);

        # REQUIRED USING SAVE
        $student = new Student;
        $student->nama = $request->input('nama');
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->jurusan = $request->input('jurusan');
        $student->save();
        $data = [
            'message' => 'Students is created successfully',
            'data' => $student
        ];
        return response()->json($data, 201);

        # NO REQUIRED (DEFAULT) USING CREATE
        // $input = [
        //     'nama' => $request->nama ?? 'NULL',
        //     'nim' => $request->nim ?? 'NULL',
        //     'email' => $request->email ?? 'NULL',
        //     'jurusan' => $request->jurusan ?? 'NULL'
        // ];
        // $student = Student::create($input);
        // $data = [
        //     'message' => 'Student is created successfully',
        //     'data' => $student
        // ];
        // return response()->json($data, 201);

        # NO REQUIRED (DEFAULT) USING SAVE
        // $student = new Student;
        // $student->nama = $request->input('nama') ?? 'NULL';
        // $student->nim = $request->input('nim') ?? 'NULL';
        // $student->email = $request->input('email') ?? 'NULL';
        // $student->jurusan = $request->input('jurusan') ?? 'NULL';
        // $student->save();
        // $data = [
        //     'message' => 'Students is created successfully',
        //     'data' => $student
        // ];
        // return response()->json($data, 201);
    }

    public function update(Request $request, $id) {

        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->input('nama') ?? $student->nama,
                'nim' => $request->input('nim') ?? $student->nim,
                'email' => $request->input('email') ?? $student->email,
                'jurusan' => $request->input('nama') ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id) {

        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Student is deleted successfully',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function show($id) {

        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => "Get detail student",
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            
            return response()->json($data, 404);
        }
    }
}