<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'is_admin' => 'sometimes|boolean', // Walidacja is_admin, opcjonalna, jeśli nie podana, domyślnie false
        ]);

        // Tworzenie nowego użytkownika
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Hasło szyfrowane
            'is_admin' => $request->is_admin ?? false, // Jeśli nie podano, domyślnie false
        ]);

        return response()->json($user, 201);  // Zwróci utworzonego użytkownika z kodem 201
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);  // Szuka użytkownika po id
        return response()->json($user);  // Zwróci użytkownika
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);  // Znajdź użytkownika

        // Walidacja
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        // Aktualizacja danych użytkownika
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,  // Jeśli hasło jest puste, nie zmienia
        ]);

        return response()->json($user);  // Zwróci zaktualizowanego użytkownika
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);  // Znajdź użytkownika po id
        $user->delete();  // Usuń użytkownika

        return response()->json(null, 204);  // Zwróci status 204 (brak treści), jeśli usunięto użytkownika
    }

}
