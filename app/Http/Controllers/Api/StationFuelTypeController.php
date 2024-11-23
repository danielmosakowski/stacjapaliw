<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StationFuelType;

class StationFuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StationFuelType::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'station_id' => 'required|exists:stations,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
        ]);

        return StationFuelType::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stationFuelType = StationFuelType::findOrFail($id);
        return response()->json($stationFuelType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stationFuelType = StationFuelType::findOrFail($id);

        $request->validate([
            'station_id' => 'sometimes|exists:stations,id',
            'fuel_type_id' => 'sometimes|exists:fuel_types,id',
        ]);

        $stationFuelType->update($request->all());

        return $stationFuelType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stationFuelType = StationFuelType::findOrFail($id);
        $stationFuelType->delete();

        return response()->noContent();
    }
}
