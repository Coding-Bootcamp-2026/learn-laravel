<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);


        $user = User::create($validateData);

        $token = $user->createToken($request->name);


        return response()->json([
            'status' => 'OK',
            'message' => 'Register User Successfully!',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ]
            ];
        }


        $token = $user->createToken($user->name);


        return response()->json([
            'status' => 'OK',
            'message' => 'Login User Successfully!',
            'user' => $user,
            'token' => $token->plainTextToken, // tambahkan juga plainTextToken di register
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Logout User Successfully!'
        ]);
    }
}
