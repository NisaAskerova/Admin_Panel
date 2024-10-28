<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all(); 
        return response()->json($sliders);
    }

    public function stores(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heroImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'backImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image')->store('sliders', 'public');
        $heroImage = $request->file('heroImage')->store('sliders', 'public');
        $backImage = $request->file('backImage')->store('sliders', 'public');
        $icon = $request->file('icon')->store('sliders', 'public');

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $image;
        $slider->heroImage = $heroImage;
        $slider->backImage = $backImage;
        $slider->icon = $icon;
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider added successfully!');
    }

    public function show()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }
}
