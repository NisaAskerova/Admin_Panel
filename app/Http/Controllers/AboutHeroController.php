<?php

namespace App\Http\Controllers;

use App\Models\AboutHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutHeroController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutHero = new AboutHero();
        $aboutHero->title = $request->title;

        if ($request->hasFile('image')) {
            $aboutHero->image = $request->file('image')->store('images', 'public');
        }

        $aboutHero->save();
        return response()->json(['message' => 'About hero information added successfully!'], 201);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutHero = AboutHero::findOrFail($id);
        $aboutHero->title = $request->title;

        if ($request->hasFile('image')) {
            if ($aboutHero->image && Storage::disk('public')->exists($aboutHero->image)) {
                Storage::disk('public')->delete($aboutHero->image);
            }
            $aboutHero->image = $request->file('image')->store('images', 'public');
        }

        $aboutHero->save();
        return response()->json(['message' => 'About hero information updated successfully!'], 200);
    }

    public function delete($id){
        $aboutHero = AboutHero::findOrFail($id);

        if ($aboutHero->image && Storage::disk('public')->exists($aboutHero->image)) {
            Storage::disk('public')->delete($aboutHero->image);
        }

        $aboutHero->delete();
        return response()->json(['message' => 'About hero deleted successfully!'], 200);
    }

    public function show(){
        $aboutHero = AboutHero::all();
        return response()->json($aboutHero, 200);
    }
}
