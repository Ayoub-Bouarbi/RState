<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only(['email', 'password']);

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => "error",
                'message' => "unauthorized"
            ], 401);
        }

        $user = Auth::user();


        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer'
            ]
        ]);
    }

    function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer'
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => "logged out successfully"
        ]);
    }
}
