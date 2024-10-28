<?php

namespace App\Http\Controllers;

use App\Models\WhoWeAreMain;
use App\Models\WhoWeAreService;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    // Main Information - Store
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',  // required
            'main_description' => 'required|string',      // required
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mainInfo = new WhoWeAreMain();
        $mainInfo->main_title = $request->main_title;
        $mainInfo->main_description = $request->main_description;

        if ($request->hasFile('image')) {
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }

        $mainInfo->save();

        return response()->json(['message' => 'Main information added successfully!'], 201);
    }

    // Main Information - Update
    public function updateMainInfo(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'nullable|string|max:255',
            'main_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $mainInfo = WhoWeAreMain::findOrFail($id);
    
        // Eski dəyərləri saxlayın
        $mainInfo->main_title = $request->main_title ?: $mainInfo->main_title;
        $mainInfo->main_description = $request->main_description ?: $mainInfo->main_description;
    
        if ($request->hasFile('image')) {
            // Eski şəkili sil
            if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
                unlink(public_path('storage/' . $mainInfo->image));
            }
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }
    

    // Other methods remain unchanged...

    
    // Service Information - Store
    public function addServiceInfo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'required|string',
        ]);

        $service = new WhoWeAreService();
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('icon')) {
            $service->icon = $request->file('icon')->store('icons', 'public');
        }

        $service->color = $request->color;
        $service->save();

        return response()->json(['message' => 'Service information added successfully!'], 201);
    }

    // Service Information - Update
    public function updateServiceInfo(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'nullable|string', // required götürüldü
        ]);
    
        $service = WhoWeAreService::findOrFail($id);
    
        $service->title = $request->title ?: $service->title;
        $service->description = $request->description ?: $service->description;
        $service->color = $request->color ?? '#fff'; // Default olaraq #fff təyin edildi
    
        if ($request->hasFile('icon')) {
            if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
                unlink(public_path('storage/' . $service->icon));
            }
            $service->icon = $request->file('icon')->store('icons', 'public');
        }
    
        $service->save();
    
        return response()->json(['message' => 'Service information updated successfully!'], 200);
    }
    

    // Main Information - Delete
    public function deleteMainInfo($id)
    {
        $mainInfo = WhoWeAreMain::findOrFail($id);
        
        // Resmi sil
        if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
            unlink(public_path('storage/' . $mainInfo->image));
        }

        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    // Service Information - Delete
    public function deleteServiceInfo($id)
    {
        $service = WhoWeAreService::findOrFail($id);
        
        // İkonu sil
        if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
            unlink(public_path('storage/' . $service->icon));
        }

        $service->delete();

        return response()->json(['message' => 'Service information deleted successfully!'], 200);
    }

    // Get all Service Information
    public function getServiceInfo()
    {
        $services = WhoWeAreService::all();
        return response()->json($services, 200);
    }

    // Get all Main Information
    public function getMainInfo()
    {
        $mainInfo = WhoWeAreMain::all();
        return response()->json($mainInfo, 200);
    }

    public function getServiceInfoById($id)
{
    $service = WhoWeAreService::findOrFail($id);
    return response()->json($service, 200);
}
}
