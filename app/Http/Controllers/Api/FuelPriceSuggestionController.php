<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserReward;
use Illuminate\Http\Request;
use App\Models\FuelPriceSuggestion;
use Illuminate\Support\Facades\Storage;  // Dodanie aliasu dla Storage

class FuelPriceSuggestionController extends Controller
{
//    public function __construct()
//    {
    // Middleware auth:sanctum chroni wszystkie metody tego kontrolera
 //       $this->middleware('auth:sanctum');
//    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FuelPriceSuggestion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'station_fuel_type_id' => 'required|exists:station_fuel_types,id',
            'suggested_price' => 'required|numeric|min:0',
            'price_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Walidacja zdjęcia
        ]);

        // Tworzenie nowej sugestii ceny
        $suggestion = new FuelPriceSuggestion();

        // Masowe przypisanie danych
        $suggestion->fill([
            'user_id' => $request->user_id,
            'station_fuel_type_id' => $request->station_fuel_type_id,
            'suggested_price' => $request->suggested_price,
            'price_date' => $request->price_date,
        ]);

        // Obsługa zdjęcia
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public'); // Zapisz zdjęcie w publicznym folderze
            $suggestion->photo_path = $path;
        }

        // Zapisz dane w bazie
        $suggestion->save();

        // Odpowiedź z sukcesem
        return response()->json($suggestion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);
        return response()->json($fuelPriceSuggestion);
    }

    public function showUserFuelPriceSuggestion($userId)
    {
        // Pobranie nagród przypisanych do użytkownika
        $fuelPriceSuggestion = FuelPriceSuggestion::where('user_id', $userId)->get();

        // Zwrócenie nagród w formacie JSON
        return response()->json($fuelPriceSuggestion);
    }


    public function update(Request $request, string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);
    
        // Walidacja danych wejściowych (zachowana logika)
        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'suggested_price' => 'sometimes|numeric',
            'price_date' => 'sometimes|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'station_fuel_type_id' => 'sometimes|exists:station_fuel_types,id',
            'approved' => 'sometimes|in:0,1',  // Dodana walidacja dla statusu 'approved'
        ]);
    
        // Obsługa pliku zdjęcia (bez zmian)
        if ($request->hasFile('photo')) {
            if ($fuelPriceSuggestion->photo_path) {
                Storage::disk('public')->delete($fuelPriceSuggestion->photo_path);
            }
    
            $photoPath = $request->file('photo')->store('photos', 'public');
            $fuelPriceSuggestion->photo_path = $photoPath;
        }
    
        // Aktualizacja danych, w tym ewentualna zmiana statusu zatwierdzenia (approved)
        if ($request->has('approved')) {
            $fuelPriceSuggestion->approved = $request->approved; // Zmieniamy status na zatwierdzony lub niezatwierdzony
        }
    
        $fuelPriceSuggestion->update($validated);
    
        return response()->json($fuelPriceSuggestion);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);

        if ($fuelPriceSuggestion->photo_path) {
            Storage::disk('public')->delete($fuelPriceSuggestion->photo_path);
        }

        $fuelPriceSuggestion->delete();

        return response()->noContent();
    }

    public function showAllFuelPriceSuggestions()
    {
        // Pobranie wszystkich zgłoszeń
        $fuelPriceSuggestions = FuelPriceSuggestion::all();
    
        // Zwrócenie zgłoszeń w formacie JSON
        return response()->json($fuelPriceSuggestions);
    }
    


}
