<?php

namespace App\Http\Controllers;

use App\Models\OurVisionMain;
use App\Models\OurVisionService;
use Illuminate\Http\Request;

class OurVisionMissionController extends Controller
{
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Corrected 'desctiption' to 'description'
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $mainInfo = new OurVisionMain();
        $mainInfo->type = $request->type;
        $mainInfo->title = $request->title;
        $mainInfo->description = $request->description; // Corrected 'desctiption' to 'description'
    
        if ($request->hasFile('image')) {
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information added successfully!'], 201);
    }
    
    public function updateMainInfo(Request $request, $id)
    {
        $request->validate([
            'type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string', // Corrected 'desctiption' to 'description'
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $mainInfo = OurVisionMain::findOrFail($id);
    
        $mainInfo->type = $request->type ?: $mainInfo->type;
        $mainInfo->title = $request->title ?: $mainInfo->title;
        $mainInfo->description = $request->description ?: $mainInfo->description; // Corrected 'desctiption' to 'description'
    
        if ($request->hasFile('image')) {
            if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
                unlink(public_path('storage/' . $mainInfo->image));
            }
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }
    

    // Delete Main Info
    public function deleteMainInfo($id)
    {
        $mainInfo = OurVisionMain::findOrFail($id);

        if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
            unlink(public_path('storage/' . $mainInfo->image));
        }

        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    // Get Main Info
    public function getMainInfo()
    {
        $mainInfo = OurVisionMain::all();
        return response()->json($mainInfo, 200);
    }

    // Add Service Info
    public function addServiceInfo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = new OurVisionService();
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('icon')) {
            $service->icon = $request->file('icon')->store('icons', 'public');
        }

        $service->save();

        return response()->json(['message' => 'Service information added successfully!'], 201);
    }

    // Update Service Info
    public function updateServiceInfo(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = OurVisionService::findOrFail($id);

        $service->title = $request->input('title', $service->title);
        $service->description = $request->input('description', $service->description);

        if ($request->hasFile('icon')) {
            if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
                unlink(public_path('storage/' . $service->icon));
            }
            $service->icon = $request->file('icon')->store('icons', 'public');
        }

        $service->save();

        return response()->json(['message' => 'Service information updated successfully!'], 200);
    }

    // Delete Service Info
    public function deleteServiceInfo($id)
    {
        $service = OurVisionService::findOrFail($id);

        if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
            unlink(public_path('storage/' . $service->icon));
        }

        $service->delete();

        return response()->json(['message' => 'Service information deleted successfully!'], 200);
    }

    // Get Service Info
    public function getServiceInfo()
    {
        $services = OurVisionService::all();
        return response()->json($services, 200);
    }
}
