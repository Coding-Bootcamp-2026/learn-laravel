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
            'message' => 'Register User Succesfully!',
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Kredensial Tidak Cocok',
                'errors' => [
                    'email' => ['Email atau password salah!'],
                ],
            ], 401);
        }

        $token = $user->createToken($user->name);

        return response()->json([
            'status' => 'OK',
            'message' => 'Login User Succesfully!',
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Logout User Succesfully!',
        ]);
    }
}
