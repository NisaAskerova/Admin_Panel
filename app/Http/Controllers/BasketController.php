<?php
namespace App\Http\Controllers;

use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct()
    {
        // Only authenticated users with a valid API token can access these actions
        $this->middleware('auth:sanctum')->only(['index', 'store', 'updateQuantity']);
    }

    // Display products in the basket
    public function index()
    {
        $user = auth()->user(); // Automatically checks the token

        if (!$user || !$user->basket) {
            return response()->json(['error' => 'User does not have a basket'], 404);
        }

        // Fetch products in the user's basket
        $products = BasketProduct::with('product:id,title,price,image,stock_quantity')
            ->where('basket_id', $user->basket->id)
            ->get();

        return response()->json($products, 200);
    }

    // Add product to the basket
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user || !$user->basket) {
            return response()->json(['error' => 'User does not have a basket'], 404);
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if (!$product->isInStock()) {
            return response()->json(['error' => 'Product out of stock'], 400);
        }

        $basketProduct = BasketProduct::where('basket_id', $basketId)
            ->where('product_id', $product->id)
            ->first();

        if ($basketProduct) {
            if ($basketProduct->quantity + 1 > $product->stock_quantity) {
                return response()->json(['error' => 'Quantity exceeds available stock'], 400);
            }
            $basketProduct->quantity++;
            $basketProduct->save();
        } else {
            $basketProduct = new BasketProduct();
            $basketProduct->basket_id = $basketId;
            $basketProduct->product_id = $product->id;
            $basketProduct->quantity = 1;
            $basketProduct->save();
        }

        return response()->json(['message' => 'Product added to basket'], 200);
    }

    // Update product quantity in the basket
    public function updateQuantity(Request $request, $action)
    {
        $user = auth()->user();
        if (!$user || !$user->basket) {
            return response()->json(['error' => 'Please log in to manage your basket.'], 401);
        }

        $basketProduct = BasketProduct::where('basket_id', $user->basket->id)
            ->where('product_id', $request->product_id)
            ->with('product:id,stock_quantity')
            ->first();

        if (!$basketProduct) {
            return response()->json(['error' => 'Product not in basket.'], 404);
        }

        $product = $basketProduct->product;
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Increase or decrease the quantity based on action
        if ($action === 'increase') {
            if ($basketProduct->quantity + 1 > $product->stock_quantity) {
                return response()->json(['error' => 'Quantity exceeds available stock.'], 400);
            }
            $basketProduct->quantity++;
        } elseif ($action === 'decrease') {
            if ($basketProduct->quantity - 1 <= 0) {
                return response()->json(['error' => 'Quantity cannot be less than 1.'], 400);
            }
            $basketProduct->quantity--;
        } else {
            return response()->json(['error' => 'Invalid action.'], 400);
        }

        $basketProduct->save();

        return response()->json(['success' => true, 'message' => 'Quantity updated successfully.'], 200);
    }
}

