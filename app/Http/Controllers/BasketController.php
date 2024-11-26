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
        $this->middleware('auth:sanctum')
            ->only(
                [
                    'show',
                    'store',
                    'updateQuantity',
                    'basketQuantity',
                    'removeProductFromBasket',
                    'calculateTotal'
                ]
            );
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

    // Calculate total quantity and total price
    $totalQuantity = $products->sum('quantity');  // Sum the quantities of the products
    $totalPrice = $products->sum(function ($basketProduct) {
        return $basketProduct->quantity * $basketProduct->product->price; // Calculate total price by multiplying quantity and product price
    });

    // Return the products along with the total quantity and total price
    return response()->json([
        'products' => $products,
        'total_quantity' => $totalQuantity,
        'total_price' => $totalPrice
    ], 200);
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

        if (!$product || !$product->has_stock) {
            return response()->json(['message' => 'Product not available'], 404);
        }

        $basketProduct = BasketProduct::where('basket_id', $basketId)
            ->where('product_id', $product->id)
            ->first();

        if ($basketProduct) {
            $basketProduct->quantity += $request->quantity;
            $basketProduct->save();
        } else {
            BasketProduct::create([
                'basket_id' => $basketId,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added successfully'], 200);
    }


    // Update product quantity in the basket
    // Update quantity in the basket
    public function updateQuantity(Request $request, $action)
    {
        $user = auth()->user(); // Get the logged-in user
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
    
        // Get the product from the products table to check stock quantity
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        // Check stock limits
        if ($action === 'increase') {
            if ($basketProduct->quantity + 1 > $product->stock_quantity) {
                return response()->json([
                    'error' => 'Cannot increase quantity beyond available stock'
                ], 400);
            }
            $basketProduct->quantity += 1;
        } elseif ($action === 'decrease' && $basketProduct->quantity > 1) {
            $basketProduct->quantity -= 1;
        } else {
            return response()->json(['error' => 'Invalid action or insufficient quantity'], 400);
        }
    
        $basketProduct->save();
    
        return response()->json(['success' => 'Quantity updated successfully'], 200);
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

    public function removeProductFromBasket(Request $request, $basketId, $productId)
    {
        $user = auth()->user();
        $basketProduct = BasketProduct::where('basket_id', $basketId)
            ->where('product_id', $productId)
            ->first();

        if (!$basketProduct) {
            return response()->json(['error' => 'Product not found in the basket'], 404);
        }

        // Delete the product from the basket
        $basketProduct->delete();

        return response()->json(['success' => 'Product removed from basket'], 200);
    }


    public function calculateTotal()
    {
        try {
            $user = auth()->user();
            
            // Check if the user is authenticated
            if (!$user) {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
    
            // Check if the user has a basket
            $basket = $user->basket;
            if (!$basket) {
                $basket = $user->basket()->create(); // Create a basket if it doesn't exist
            }
    
            $basketId = $basket->id;
    
            // Calculate total quantity
            $totalQuantity = BasketProduct::where('basket_id', $basketId)
                ->where('quantity', '>', 0) // Ensure valid quantities
                ->sum('quantity');
    
            // Calculate the total price
            $totalPrice = BasketProduct::where('basket_id', $basketId)
                ->join('products', 'basket_products.product_id', '=', 'products.id')
                ->whereNotNull('products.price') // Ensure product has a valid price
                ->sum(\DB::raw('basket_products.quantity * products.price'));
    
            // Return the response
            return response()->json([
                'total_quantity' => $totalQuantity,
                'total_price' => $totalPrice
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
    
    
}
