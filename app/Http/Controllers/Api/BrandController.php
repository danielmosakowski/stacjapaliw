<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Brand::all(), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Brand::findOrFail($id);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);
        return Brand::create($request->all());
    }

    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());

        return $brand;
    }

    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['message' => 'Marka została usunięta.'], 200);
    }
}

