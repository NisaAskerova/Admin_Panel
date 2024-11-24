<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct()
    {
        // Only authenticated users with a valid API token can access these actions
        $this->middleware('auth:sanctum')->only(['show', 'store', 'updateQuantity', 'basketQuantity', 'removeProductFromBasket']);
    }

    // Display products in the basket
    public function show()
    {
        $user = auth()->user();
    
        if (!$user || !$user->basket) {
            return response()->json(['error' => 'User does not have a basket'], 404);
        }
    
        // Fetch products in the user's basket
        $products = BasketProduct::with('product:id,title,price,image,stock_quantity')
            ->where('basket_id', $user->basket->id)
            ->get()
            ->map(function ($basketProduct) {
                $basketProduct->quantity = $basketProduct->quantity; // Directly access the quantity from BasketProduct
                return $basketProduct;
            });
        
        return response()->json($products, 200);
    }
    
    // Add product to the basket
    public function store(Request $request)
    {

        $user = auth()->user();

        if (!$user->basket) {
            $user->basket()->create();
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json([
                'message' => "Product not found",
                'success' => false
            ], 404);
        }

        // Check if the product is in stock
        if (!$product->has_stock) {
            return response()->json([
                'message' => "Product out of stock",
                'success' => false
            ], 400);
        }

        // Find the product in the user's basket
        $basketProduct = BasketProduct::where('basket_id', $basketId)
            ->where('product_id', $product->id)
            ->first();

        // Check if the product is already in the basket
        if ($basketProduct) {
            // Check if there's enough stock to increase the quantity
            if ($basketProduct->quantity + $request->quantity > $product->stock_quantity) {
                return response()->json([
                    'message' => "Not enough stock_quantity available",
                    'success' => false
                ], 400);
            }

            // Update the quantity in the basket
            $basketProduct->quantity += $request->quantity;
            $basketProduct->save();
        } else {
            // If the product is not in the basket, add it
            if ($request->quantity > $product->stock_quantity) {
                return response()->json([
                    'message' => "Not enough stock_quantity available",
                    'success' => false
                ], 400);
            }

            // Add the new product to the basket
            BasketProduct::create([
                'basket_id' => $basketId,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        // Update the product stock_quantity
        $product->stock_quantity -= $request->quantity;
        $product->save();

        // If product stock_quantity is zero, mark it as out of stock_quantity
        if ($product->stock_quantity == 0) {
            $product->hasStock = false;
            $product->save();
        }

        return response()->json([
            'message' => "Product added to basket",
            'success' => true
        ], 200);
    }


    // Update product quantity in the basket
    // Update quantity in the basket
    public function updateQuantity(Request $request, $action)
    {
        $user = auth()->user();
        $basketId = $user->basket->id;

        // Find the product in the basket
        $basketProduct = BasketProduct::where('basket_id', $basketId)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$basketProduct) {
            return response()->json([
                'error' => 'Product not found in the basket'
            ], 404);
        }

        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }

        if ($action === 'increase') {
            if ($product->stock_quantity < 1) {
                return response()->json([
                    'error' => 'No more stock available'
                ], 400);
            }

            $basketProduct->quantity += 1;
            $product->stock_quantity -= 1;
        } elseif ($action === 'decrease') {
            if ($basketProduct->quantity <= 1) {
                return response()->json([
                    'error' => 'Cannot reduce below 1'
                ], 400);
            }

            $basketProduct->quantity -= 1;
            $product->stock_quantity += 1;
        }

        $basketProduct->save();
        $product->save();

        return response()->json([
            'message' => 'Quantity updated successfully',
            'success' => true
        ], 200);
    }
    public function basketQuantity()
    {
        $user = auth()->user();

        if (!$user || !$user->basket) {
            return response()->json(['error' => 'User does not have a basket'], 404);
        }

        // Fetch distinct products in the basket (one product per type)
        $products = BasketProduct::with('product:id,title,price,stock_quantity')
            ->where('basket_id', $user->basket->id)
            ->distinct('product_id') // Ensuring we only count unique products
            ->get();

        // Get the number of distinct products
        $productCount = $products->count();

        // Return the product count as JSON
        return response()->json(['total_items' => $productCount], 200);
    }

    public function removeProductFromBasket($basketId, $productId)
    {
        // Log the inputs to check if they are correct
        \Log::info("Attempting to remove product from basket. Basket ID: {$basketId}, Product ID: {$productId}");
        
        // Find the basket product entry by its ID
        $basketProduct = BasketProduct::where('basket_id', $basketId)
                                      ->where('product_id', $productId)
                                      ->first();
        
        if (!$basketProduct) {
            \Log::error("Product not found. Basket ID: {$basketId}, Product ID: {$productId}");
            return response()->json(['error' => 'Product not found in this basket'], 404);
        }
        
        // Delete the basket product
        $basketProduct->delete();
        
        return response()->json(['message' => 'Product removed from basket successfully'], 200);
    }
    
    
}
