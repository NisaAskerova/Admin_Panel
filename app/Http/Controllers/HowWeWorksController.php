<?php

namespace App\Http\Controllers;

use App\Models\HowWeWorksMain;
use App\Models\HowWeWorksService;
use Illuminate\Http\Request;

class HowWeWorksController extends Controller
{
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
            'main_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mainInfo = new HowWeWorksMain();
        $mainInfo->type = $request->type;
        $mainInfo->main_title = $request->main_title;
        $mainInfo->main_description = $request->main_description;

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
            'main_title' => 'nullable|string|max:255',
            'main_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $mainInfo = HowWeWorksMain::findOrFail($id);
    
        // Eski dəyərləri saxlayın
        $mainInfo->type = $request->type ?: $mainInfo->type;
        $mainInfo->main_title = $request->main_title ?: $mainInfo->main_title;
        $mainInfo->main_description = $request->main_description ?: $mainInfo->main_description;
    
        if ($request->hasFile('image')) {
            if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
                unlink(public_path('storage/' . $mainInfo->image));
            }
            $mainInfo->image = $request->file('image')->store('images', 'public');
        }
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }

    public function deleteMainInfo($id)
    {
        $mainInfo = HowWeWorksMain::findOrFail($id);

        if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
            unlink(public_path('storage/' . $mainInfo->image));
        }

        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function getMainInfo()
    {
        $mainInfo = HowWeWorksMain::all();
        return response()->json($mainInfo, 200);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////
    public function addServiceInfo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = new HowWeWorksService();
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('icon')) {
            $service->icon = $request->file('icon')->store('icons', 'public');
        }

        $service->save();

        return response()->json(['message' => 'Service information added successfully!'], 201);
    }

    public function updateServiceInfo(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $service = HowWeWorksService::findOrFail($id);
    
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
    


    public function deleteServiceInfo($id)
    {
        $service = HowWeWorksService::findOrFail($id);

        if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
            unlink(public_path('storage/' . $service->icon));
        }

        $service->delete();

        return response()->json(['message' => 'Service information deleted successfully!'], 200);
    }

    public function getServiceInfo()
    {
        $services = HowWeWorksService::all();
        return response()->json($services, 200);
    }

    // public function getServiceInfoById($id)
    // {
    //     $service = WhoWeAreService::findOrFail($id);
    //     return response()->json($service, 200);
    // }
}
