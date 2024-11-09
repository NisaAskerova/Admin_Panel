<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();
        
        return response()->json(['message' => 'Brand added successfully!'], 201);
    }

    public function show() {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $brand = Brand::find($id);
        if ($brand) {
            $brand->name = $request->name;
            $brand->save();
            return response()->json(['message' => 'Brand updated successfully!']);
        } else {
            return response()->json(['message' => 'Brand not found!'], 404);
        }
    }

    public function delete($id) {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return response()->json(['message' => 'Brand deleted successfully!']);
        } else {
            return response()->json(['message' => 'Brand not found!'], 404);
        }
    }
    // app/Http/Controllers/BrandController.php
public function index($id) {
    $brand = Brand::find($id);
    if ($brand) {
        return response()->json($brand);
    } else {
        return response()->json(['message' => 'Brand not found!'], 404);
    }
}

}
