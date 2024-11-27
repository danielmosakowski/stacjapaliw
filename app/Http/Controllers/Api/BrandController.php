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



}
