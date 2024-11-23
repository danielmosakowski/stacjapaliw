<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StationPrice;

class StationPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stationPrices = StationPrice::all();
        return response()->json($stationPrices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'station_id' => 'required|exists:stations,id',
            'station_fuel_type_id' => 'required|exists:station_fuel_types,id',
            'price' => 'required|numeric',
            'price_date' => 'required|date',
        ]);

        // Tworzenie nowego wpisu w tabeli station_prices
        $stationPrice = StationPrice::create($request->all());

        // Zwracamy nowo utworzony obiekt jako odpowiedź z kodem 201
        return response()->json($stationPrice, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stationPrice = StationPrice::findOrFail($id);  // Szuka ceny stacji po ID
        return response()->json($stationPrice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stationPrice = StationPrice::findOrFail($id);  // Szuka ceny stacji po ID

        // Walidacja danych
        $request->validate([
            'station_id' => 'sometimes|exists:stations,id',
            'station_fuel_type_id' => 'sometimes|exists:station_fuel_types,id',
            'price' => 'sometimes|numeric',
            'price_date' => 'sometimes|date',
        ]);

        // Aktualizacja danych
        $stationPrice->update($request->all());

        return response()->json($stationPrice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StationPrice::destroy($id);  // Usuwanie ceny stacji

        return response()->noContent();  // Zwraca odpowiedź 204 No Content
    }
}
