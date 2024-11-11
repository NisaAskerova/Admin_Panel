<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heroImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'backImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg,svg|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $image = $request->file('image')->store('sliders', 'public');
        $heroImage = $request->file('heroImage')->store('sliders', 'public');
        $backImage = $request->file('backImage')->store('sliders', 'public');
        $icon = $request->file('icon')->store('sliders', 'public');
    
        $slider = Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'heroImage' => $heroImage,
            'backImage' => $backImage,
            'icon' => $icon,
        ]);
    
        return response()->json(['message' => 'Slider added successfully!', 'slider' => $slider], 201);
    }

    public function show($id)
    {
        $sliders = Slider::findOrFail($id);
        return response()->json($sliders, 200);
    }
    public function get()
    {
        $sliders = Slider::all();
        return response()->json($sliders, 200);
    }
    
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heroImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'backImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('sliders', 'public');
        }

        if ($request->hasFile('heroImage')) {
            $slider->heroImage = $request->file('heroImage')->store('sliders', 'public');
        }

        if ($request->hasFile('backImage')) {
            $slider->backImage = $request->file('backImage')->store('sliders', 'public');
        }

        if ($request->hasFile('icon')) {
            $slider->icon = $request->file('icon')->store('sliders', 'public');
        }

        $slider->save();

        return response()->json(['message' => 'Slider updated successfully!', 'slider' => $slider], 200);
    }
}
