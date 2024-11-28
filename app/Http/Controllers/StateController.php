<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    // Bütün state-ləri göstər
    public function index()
    {
        $states = State::all();
        return response()->json($states);
    }


    // Yeni state yarat
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $state = new State();
        $state->name = $request->name;
        $state->save();

        return response()->json([
            'message' => 'State created successfully!',
            'state' => $state
        ]);
    }

    // Müəyyən bir state göstər
    public function show($id)
    {
        $state = State::find($id);

        if (!$state) {
            return response()->json(['message' => 'State not found!'], 404);
        }

        return response()->json($state);
    }


    // Mövcud state yenilə
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $state = State::find($id);

        if (!$state) {
            return response()->json(['message' => 'State not found!'], 404);
        }

        $state->name = $request->name;
        $state->save();

        return response()->json([
            'message' => 'State updated successfully!',
            'state' => $state
        ]);
    }

    // Mövcud state sil
    public function delete($id)
    {
        $state = State::find($id);
    
        if (!$state) {
            return response()->json(['message' => 'State not found!'], 404);
        }
    
        $state->delete();
    
        return response()->json(['message' => 'State deleted successfully!']);
    }
    
}
