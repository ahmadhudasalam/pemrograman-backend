<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    # Get All Resource
    public function index() {

        $patients = Patient::all();

        if (!$patients->isEmpty()) {

            $data = [
                'message' => 'Get All Resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data is empty'
            ];

            return response()->json($data, 200);
        }
    }

    # Add Resource
    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'numeric|required',
            'status' => 'required',
            'address' => 'required',
            'in_date_at' => 'date|required',
            'out_date_at' => 'date|required'
        ]);

        $patient = Patient::create($validatedData);

        $data = [
            'message' => 'Resource is add successfully',
            'data' => $patient
        ];

        return response()->json($data, 201);
    }

    # Get Detail Resource
    public function show($id) {

        $patient = Patient::find($id);

        if ($patient) {

            $data = [
                'message' => "Get Detail Resource",
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    # Edit Resource
    public function update(Request $request, $id) {

        $patient = Patient::find($id);

        if ($patient) {
            $input = [
                'nama' => $request->input('name') ?? $patient->name,
                'phone' => $request->input('phone') ?? $patient->phone,
                'status' => $request->input('status') ?? $patient->status,
                'address' => $request->input('address') ?? $patient->address,
                'in_date_at' => $request->input('in_date_at') ?? $patient->in_date_at,
                'out_date_at' => $request->input('out_date_at') ?? $patient->out_date_at
            ];

            $patient->update($input);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    # Delete Resource
    public function destroy($id) {

        $patient = Patient::find($id);

        if ($patient) {

            $patient->delete();

            $data = [
                'message' => 'Resource is deleted successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    # Search Resource
    public function search($name) {

        $patients = DB::table('patients')
                    ->where('name', '=', $name)
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Get search resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data is empty'
             ];

            return response()->json($data, 404);
        }
    }

    # Get Positive Resource
    public function positive() {

        $patients = DB::table('patients')
                    ->where('status', '=', 'positive')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Get positive resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data is empty'
            ];

            return response()->json($data, 200);
        }
    }

    # Get Recovered Resource
    public function recovered() {

        $patients = DB::table('patients')
                    ->where('status', '=', 'recovered')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Get recovered resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data is empty'
            ];

            return response()->json($data, 200);
        }
    }

    # Get Dead Resource
    public function dead() {

        $patients = DB::table('patients')
                    ->where('status', '=', 'dead')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Get dead resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data is empty'
            ];
            
            return response()->json($data, 200);
        }
    }
}
