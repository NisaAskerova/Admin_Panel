<?php

namespace App\Http\Controllers;

use App\Models\OurTeamMain;
use Illuminate\Http\Request;
use App\Models\OurTeamService;

class OurTeamController extends Controller
{
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $mainInfo = new OurTeamMain();
        $mainInfo->type = $request->type;
        $mainInfo->title = $request->title;
        $mainInfo->description = $request->description;
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information added successfully!'], 201);
    }
    
    public function updateMainInfo(Request $request, $id)
    {
        $request->validate([
            'type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $mainInfo = OurTeamMain::findOrFail($id);
    
        $mainInfo->type = $request->type ?: $mainInfo->type;
        $mainInfo->title = $request->title ?: $mainInfo->title;
        $mainInfo->description = $request->description ?: $mainInfo->description;
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }
    

    // Delete Main Info
    public function deleteMainInfo($id)
    {
        $mainInfo = OurTeamMain::findOrFail($id);
        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function getMainInfo()
    {
        $mainInfo = OurTeamMain::all();
        return response()->json($mainInfo, 200);
    }
    public function showMainInfo($id)
    {
        $mainInfo = OurTeamMain::findOrFail($id);
        return response()->json($mainInfo, 200);
    }

    // Add Service Info
    public function addServiceInfo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = new OurTeamService();
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            $service->image = $request->file('image')->store('icons', 'public');
        }

        $service->save();

        return response()->json(['message' => 'Service information added successfully!'], 201);
    }

    public function updateServiceInfo(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = OurTeamService::findOrFail($id);

        $service->title = $request->input('title', $service->title);
        $service->description = $request->input('description', $service->description);

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path('storage/' . $service->image))) {
                unlink(public_path('storage/' . $service->image));
            }
            $service->image = $request->file('image')->store('icons', 'public');
        }

        $service->save();

        return response()->json(['message' => 'Service information updated successfully!'], 200);
    }

    public function deleteServiceInfo($id)
    {
        $service = OurTeamService::findOrFail($id);

        if ($service->image && file_exists(public_path('storage/' . $service->image))) {
            unlink(public_path('storage/' . $service->image));
        }

        $service->delete();

        return response()->json(['message' => 'Service information deleted successfully!'], 200);
    }

    public function getServiceInfo()
    {
        $services = OurTeamService::all();
        return response()->json($services, 200);
    }
    public function showServiceInfo($id)
    {
        $services = OurTeamService::findOrFail($id);
        return response()->json($services, 200);
    }
}
