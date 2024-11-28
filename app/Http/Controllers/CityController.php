<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // Bütün cities siyahısı
    public function index()
    {
        $cities = City::with('state')->get();
        return response()->json($cities);
    }

    // Şəhər əlavə et
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        $city = City::create($request->all());

        return response()->json(['message' => 'City uğurla əlavə edildi!', 'data' => $city]);
    }

    // Şəhər detalları
    public function show($id)
    {
        $city = City::with('state')->findOrFail($id);
        return response()->json($city);
    }

    // Şəhəri yenilə
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return response()->json(['message' => 'City uğurla yeniləndi!', 'data' => $city]);
    }

    // Şəhəri sil
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(['message' => 'City uğurla silindi!']);
    }
}
