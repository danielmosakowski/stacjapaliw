<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelPriceSuggestion;

class FuelPriceSuggestionController extends Controller
{
    public function __construct()
    {
        // Middleware auth:sanctum chroni wszystkie metody tego kontrolera
        $this->middleware('auth:sanctum');
    }
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'station_id' => 'required|exists:stations,id',
            'suggested_price' => 'required|numeric',
            'price_date' => 'required|date',
            'photo_path' => 'nullable|string', // Jeżeli jest opcjonalna
        ]);

        return FuelPriceSuggestion::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);
        return response()->json($fuelPriceSuggestion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'station_id' => 'sometimes|exists:stations,id',
            'suggested_price' => 'sometimes|numeric',
            'price_date' => 'sometimes|date',
            'photo_path' => 'nullable|string', // Jeżeli jest opcjonalna
        ]);

        $fuelPriceSuggestion->update($request->all());

        return response()->json($fuelPriceSuggestion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuelPriceSuggestion = FuelPriceSuggestion::findOrFail($id);
        $fuelPriceSuggestion->delete();

        return response()->noContent();
    }
}
