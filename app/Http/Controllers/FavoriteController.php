<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->only(
                [
                    'addToFavorites',
                    'showFavorites',
                    'showFavorites',
                    'removeFromFavorites',
                    'showFavoriteID'
                ]
            );
    }
    // Sevimli məhsulu əlavə et
    public function addToFavorites($productId)
    {
        $product = Product::findOrFail($productId);
        auth()->user()->favorites()->attach($product);
    
        // Return a JSON response for the API call
        return response()->json([
            'message' => 'Məhsul sevimlilərə əlavə olundu.',
            'product' => $product,
        ], 200);
    }
    

    // Sevimli məhsuldan çıxart
    public function removeFromFavorites($productId)
    {
        $product = Product::findOrFail($productId);
        auth()->user()->favorites()->detach($product);
    
        return response()->json([
            'success' => true,
            'message' => 'Məhsul sevimlilərə əlavə edilməkdən çıxarıldı.'
        ]);
    }
    
    public function showFavorites()
    {
        $favorites = auth()->user()->favorites->map(function ($favorite) {
            return [
                'id' => $favorite->id,
                'title' => $favorite->title,
                'price' => $favorite->price,
                'image' => $favorite->image, // Əgər image_url kimi saxlayırsınızsa
            ];
        });
    
        return response()->json($favorites);
    }


    public function showFavoriteID()
{
    // İstifadəçinin sevimli məhsullarını əldə edirik
    $favorites = auth()->user()->favorites->pluck('id'); // Yalnız ID-ləri alırıq
    
    return response()->json($favorites);  // ID-ləri qaytarırıq
}

    
}
    
