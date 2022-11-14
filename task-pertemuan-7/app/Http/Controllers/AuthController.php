<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully'
        ];

        return response()->json($data, 200);
    }

    public function login(Request $request) {

        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $input['email'])->first();

        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Successfully',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong'
            ];

            return response($data, 401);

            // $input = [
            //     'email' => $request->email,
            //     'paswword' => $request->password
            // ];

            // if (Auth::attemp($input)) {
            //     $token = Auth::user()->createToken('auth_token');

            //     $data = [
            //         'message' => 'Login successfully',
            //         'token' => $token->plainTextToken
            //     ];

            //     return response()->json($data, 200);
            // } else {
            //     $data = [
            //         'message' => 'Username or Password is wrong'
            //     ];

            //     return response()->json($data, 401);
            // }
        }
    }

}
