<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\City;
use App\Models\Address;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Bütün ştatları qaytarır.
     */
    public function getStates()
    {
        $states = State::all();
        return response()->json($states);
    }

    /**
     * Verilmiş ştatın şəhərlərini qaytarır.
     */
    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }

    /**
     * Verilmiş şəhərin ünvanlarını qaytarır.
     */
    public function getAddresses($cityId)
    {
        $addresses = Address::where('city_id', $cityId)->get();
        return response()->json($addresses);
    }

    /**
     * Yeni ştat əlavə edir.
     */
    public function createState(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $state = State::create($validated);
        return response()->json(['message' => 'State created successfully', 'state' => $state]);
    }

    /**
     * Yeni şəhər əlavə edir.
     */
    public function createCity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        $city = City::create($validated);
        return response()->json(['message' => 'City created successfully', 'city' => $city]);
    }

    /**
     * Yeni ünvan əlavə edir.
     */
    public function createAddress(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'address_line' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'pin_code' => 'required|string|max:10',
            'is_default' => 'nullable|boolean',
        ]);

        $address = Address::create($validated);
        return response()->json(['message' => 'Address created successfully', 'address' => $address]);
    }

    /**
     * Verilmiş ştatı silir.
     */
    public function deleteState($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        return response()->json(['message' => 'State deleted successfully']);
    }
}
