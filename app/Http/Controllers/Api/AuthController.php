<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'is_admin' => ['sometimes','boolean'],
        ]);

        // Tworzenie użytkownika z zahaszowanym hasłem
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $request->is_admin ?? false,

        ]);

        // Tworzenie tokenu dostępu
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        // Usuwa wszystkie tokeny użytkownika
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
            'data' =>[]
        ], 200);
    }

    public function userprofile()
    {
        $userData=auth()->user();
        // Zwraca informacje o zalogowanym użytkowniku
        return response()->json([
            'status' => true,
            'message' => "User Login Profile",
            'data' => $userData,
            'id' => auth()->user()->id,
            'points_total' => auth()->user()->points_total,
        ], 200);
    }
}
