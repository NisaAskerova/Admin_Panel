<?php

namespace App\Http\Controllers;

use App\Models\WhoWeAreMain;
use App\Models\WhoWeAreService;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
            'main_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mainInfo = new WhoWeAreMain();
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

    $mainInfo = WhoWeAreMain::findOrFail($id);

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
        $mainInfo = WhoWeAreMain::findOrFail($id);

        if ($mainInfo->image && file_exists(public_path('storage/' . $mainInfo->image))) {
            unlink(public_path('storage/' . $mainInfo->image));
        }

        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function showMainInfo()
    {
        $mainInfo = WhoWeAreMain::all();
        return response()->json($mainInfo, 200);
    }
    public function getMainInfo($id)
    {
        $service = WhoWeAreMain::findOrFail($id);
        return response()->json($service, 200);
    }
    /////////////////////////////////////////////////////////////////////////////////
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

    public function updateServiceInfo(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'nullable|string',
        ]);

        $service = WhoWeAreService::findOrFail($id);

        $service->title = $request->title ?: $service->title;
        $service->description = $request->description ?: $service->description;
        $service->color = $request->color ?? '#fff';

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
        $service = WhoWeAreService::findOrFail($id);

        if ($service->icon && file_exists(public_path('storage/' . $service->icon))) {
            unlink(public_path('storage/' . $service->icon));
        }

        $service->delete();

        return response()->json(['message' => 'Service information deleted successfully!'], 200);
    }

    public function getServiceInfo()
    {
        $services = WhoWeAreService::all();
        return response()->json($services, 200);
    }

    public function getServiceInfoById($id)
    {
        $service = WhoWeAreService::findOrFail($id);
        return response()->json($service, 200);
    }
}
