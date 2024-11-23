<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Station::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        return Station::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Station::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $station = Station::findOrFail($id);

        $request->validate([
            'brand_id' => 'sometimes|exists:brands,id',
            'name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
        ]);

        $station->update($request->all());

        return $station;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Station::destroy($id);

        return response()->noContent();
    }
}
