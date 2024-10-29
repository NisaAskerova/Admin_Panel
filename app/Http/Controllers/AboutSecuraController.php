<?php

namespace App\Http\Controllers;

use App\Models\AboutSecura;
use Illuminate\Http\Request;

class AboutSecuraController extends Controller
{
    public function storeAboutSecura(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mainInfo = new AboutSecura();
        $mainInfo->type = $request->type;
        $mainInfo->title = $request->title;
        $mainInfo->description = $request->description;

        if ($request->hasFile('image')) {
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('icon')) {
            $mainInfo->icon = $request->file('icon')->store('icons', 'public');
        }
        
        $mainInfo->save();

        return response()->json(['message' => 'Main information added successfully!'], 201);
    }

    public function getAboutSecura()
    {
        $mainInfo = AboutSecura::all();
        return response()->json($mainInfo, 200);
    }

    public function updateAboutSecura(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mainInfo = AboutSecura::findOrFail($id);
        $mainInfo->type = $request->type;
        $mainInfo->title = $request->title;
        $mainInfo->description = $request->description;

        if ($request->hasFile('image')) {
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('icon')) {
            $mainInfo->icon = $request->file('icon')->store('icons', 'public');
        }

        $mainInfo->save();

        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }

    public function deleteAboutSecura($id)
    {
        $mainInfo = AboutSecura::findOrFail($id);
        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }
}
