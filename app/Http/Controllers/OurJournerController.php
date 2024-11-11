<?php

namespace App\Http\Controllers;

use App\Models\OurJourneyCounter;
use App\Models\OurJourneyMain;
use Illuminate\Http\Request;

class OurJournerController extends Controller
{
    public function mainStore(Request $request){
        $request->validate([
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);
        $mainInfo=new OurJourneyMain();
        $mainInfo->type=$request->type;
        $mainInfo->title=$request->title;
        $mainInfo->description=$request->description;
        $mainInfo->save();
        return response()->json(['message' => 'Information added successfully!'], 201);
    }

    public function mainUpdate(Request $request, $id)
    {
        $request->validate([
            'type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $mainInfo = OurJourneyMain::findOrFail($id);
    
        $mainInfo->type = $request->type ?: $mainInfo->type;
        $mainInfo->title = $request->title ?: $mainInfo->title;
        $mainInfo->description = $request->description ?: $mainInfo->description;
    
        $mainInfo->save();
    
        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }

    public function deleteMainInfo($id)
    {
        $mainInfo = OurJourneyMain::findOrFail($id);
        $mainInfo->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function getMainInfo()
    {
        $mainInfo = OurJourneyMain::all();
        return response()->json($mainInfo, 200);
    }
    public function showMainInfo($id)
    {
        $mainInfo = OurJourneyMain::findOrFail($id);
        return response()->json($mainInfo, 200);
    }

    ///////////////////////////////////////////////////////////////////////
    public function storeCounter(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        $counter = new OurJourneyCounter();
        $counter->title = $request->title;
        $counter->count = $request->count;
        $counter->save();

        return response()->json(['message' => 'Counter added successfully!'], 201);
    }

    public function updateCounter(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'count' => 'nullable|integer',
        ]);

        $counter = OurJourneyCounter::findOrFail($id);
        
        $counter->title = $request->title ?: $counter->title;
        $counter->count = $request->count ?: $counter->count;
        $counter->save();

        return response()->json(['message' => 'Counter updated successfully!'], 200);
    }

    public function deleteCounter($id)
    {
        $counter = OurJourneyCounter::findOrFail($id);
        $counter->delete();

        return response()->json(['message' => 'Counter deleted successfully!'], 200);
    }

    public function getCounters()
    {
        $counters = OurJourneyCounter::all();
        return response()->json($counters, 200);
    }
    public function showCounters($id)
    {
        $counters = OurJourneyCounter::findOrFail($id);
        return response()->json($counters, 200);
    }
}
