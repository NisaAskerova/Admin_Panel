<?php

namespace App\Http\Controllers;

use App\Helper\OrderStatus;
use App\Models\BasketProduct;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['add', 'validateData']);
    }
    public function add(Request $request)
    {
        try {
            // Validasiya qaydaları
            $validator = Validator::make($request->all(), [
                'checkoutCart' => 'required|array|min:1',
                'addressData.name' => 'required|string|max:255',
                'addressData.mobile_number' => 'required|string|max:15',
                'addressData.address_line' => 'required|string|max:500',
                'addressData.area' => 'required|string|max:255',
                'addressData.city_id' => 'required|exists:cities,id',
                'addressData.pin_code' => 'required|string|max:10',
                'paymentData.payment_type' => 'required|string',
                'basket_id' => 'required|exists:baskets,id',
                'discount' => 'nullable|numeric|min:0|max:100',
                'deliveryCharge' => 'nullable|numeric|min:0',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
    
            $validatedData = $validator->validated();
            $user = auth()->user();  // İstifadəçi məlumatını əldə edirik
    
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            // Basket modelini istifadə edərək səbəti tapırıq
            $basket = Basket::where('user_id', $user->id)
                ->where('id', $validatedData['basket_id'])
                ->first();
    
            if (!$basket) {
                return response()->json(['error' => 'This basket does not belong to the logged-in user.'], 400);
            }
    
            // Sifariş yaratmaq
            $order = Order::create([
                'user_id' => $user->id,
                'uid' => uniqid('ORD-'),
                'basket_id' => $validatedData['basket_id'],
                'status' => 1, // Default status
                'name' => $validatedData['addressData']['name'],
                'mobile_number' => $validatedData['addressData']['mobile_number'],
                'address_line' => $validatedData['addressData']['address_line'],
                'area' => $validatedData['addressData']['area'],
                'city_id' => $validatedData['addressData']['city_id'],
                'pin_code' => $validatedData['addressData']['pin_code'],
                'payment_type' => $validatedData['paymentData']['payment_type'],
                'total' => 0, // Hesablamadan əvvəl sıfır
                'is_default' => false,
            ]);
    
            $total = 0;
    
            // Məhsulların əlavə edilməsi
            foreach ($validatedData['checkoutCart'] as $cartItem) {
                $product = Product::findOrFail($cartItem['product_id']);
                if ($product->stock_quantity < $cartItem['quantity']) {
                    return response()->json(['error' => "Insufficient stock for product: {$product->name}"], 400);
                }
    
                $lineTotal = $product->price * $cartItem['quantity'];
                $total += $lineTotal;
    
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cartItem['quantity'],
                    'price' => $product->price,
                    'total' => $lineTotal,
                ]);
    
                // Stok miqdarını azaldırıq
                $product->decrement('stock_quantity', $cartItem['quantity']);
            }
    
            // Ümumi məbləğin hesablanması
            $discountAmount = $total * ($validatedData['discount'] ?? 0) / 100;
            $grandTotal = $total - $discountAmount + ($validatedData['deliveryCharge'] ?? 0);
    
            $order->update(['total' => $grandTotal]);
    
            return response()->json(['message' => 'Order created successfully!', 'order_id' => $order->id], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function validateData($validatedData)
    {
        return validator($validatedData, [
            'addressData.name' => 'required|string',
            'addressData.mobile_number' => 'required|string',
            'addressData.address_line' => 'required|string',
            'addressData.area' => 'required|string',
            'addressData.city_id' => 'required|exists:cities,id',
            'addressData.pin_code' => 'required|string',
            'paymentData.payment_type' => 'required|in:cash,card',
            'checkoutCart' => 'required|array|min:1',
            'checkoutCart.*.product_id' => 'required|exists:products,id',
            'checkoutCart.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'deliveryCharge' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'basket_id' => 'required|exists:basket_products,id',
        ])->validate();
    }


    public function my_orders()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'orders' => $orders
        ]);
    }

    public function show_order_detail($id)
    {
        $orderUid = Order::select('uid')->find($id);
        $orderDetails = OrderDetail::with('product')->where('order_id', $id)->get();

        return response()->json([
            'orderUid' => $orderUid,
            'orderDetails' => $orderDetails
        ]);
    }

    public function cancel_order($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status === OrderStatus::PENDING) {
            $order->status = OrderStatus::CANCELLED;
            $order->save();

            return response()->json([
                'message' => 'Order cancelled successfully',
                'order' => $order
            ]);
        }

        return response()->json(['error' => 'Order cannot be cancelled'], 400);
    }
}
