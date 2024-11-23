<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelType;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FuelType::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fuel_types|max:255',
        ]);
        return FuelType::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return FuelType::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fuelType = FuelType::findOrFail($id);
        $fuelType->update($request->all());

        return $fuelType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FuelType::destroy($id);

        return response()->noContent();
    }
}
