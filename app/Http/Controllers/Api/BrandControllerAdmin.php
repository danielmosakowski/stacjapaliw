<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BrandControllerAdmin extends Controller
{



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
        Brand::destroy($id);

        return response()->noContent();//
    }
}
