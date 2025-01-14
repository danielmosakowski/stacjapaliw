<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try{


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
            'message' => "User registered succesfully!",
        ], 201);
    }catch (\Illuminate\Database\QueryException $e) {
            // Obsługa błędów bazy danych
            return response()->json([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            // Obsługa ogólnych błędów
            return response()->json([
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function login(LoginRequest $request)
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
            'is_admin' => $user->is_admin,
        ], 201);
    }

    public function logoutstare()
    {
        // Usuwa wszystkie tokeny użytkownika
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
            'data' =>[]
        ], 200);
    }

    public function logout(Request $request){
        $user = $request->user();
        $user -> tokens() -> delete();

        //auth()->logout();
        return response()->json([
            'message' => "User logged out"
        ],201);
    }

    public function userprofile()
    {
        if (!auth()->user()) {
            return response()->json([
                'status' => false,
                'message' => 'No user logged in',
            ], 401);
        }
        $userData=auth()->user();
        // Zwraca informacje o zalogowanym użytkowniku
        return response()->json([
            'status' => true,
            'message' => "User Login Profile",
            'data' => [
                'id' => $userData->id,
                'name' => $userData->name,
                'email' => $userData->email,
                'points_total' => $userData->points_total,
                'is_admin' => $userData->is_admin,
            ],
        ], 200);
    }
    public function checkUserStatusstary(){
        $status = auth()->check() ? true: false;
        $isAdmin = auth()->check() ? auth()->user()->is_admin : false;   //admin
        return response()->json([
            'status'=>$status,
            'is_admin' => $isAdmin  //admin
        ],200);
    }

    public function checkUserStatus()
    {
        $status = auth()->check() ? true : false;
        $user = auth()->user();
        $isAdmin = $user ? $user->is_admin : false;

        return response()->json([
            'status' => $status,
            'is_admin' => $isAdmin,
        ], 200);
    }

}
