<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return response()->json(['message' => 'Information added successfully!'], 201);
    }
    public function show(){
        $categories = Category::all();
        return response()->json($categories);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        if ($category) {
            $category->name = $request->name;
            $category->save();
            return response()->json(['message' => 'Category updated successfully!']);
        } else {
            return response()->json(['message' => 'Category not found!'], 404);
        }
    }

    public function delete($id){
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully!']);
        } else {
            return response()->json(['message' => 'Category not found!'], 404);
        }
    }
}
