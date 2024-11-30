<?php

namespace App\Http\Controllers;

use App\Helper\OrderStatus;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['add',]);
    }
    public function add(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'addressData.name' => 'required',
            'addressData.mobile_number' => 'required',
            'addressData.address_line' => 'required',
            'addressData.area' => 'required',
            'addressData.city_id' => 'required|exists:cities,id',
            'addressData.pin_code' => 'required',
            'paymentData.payment_type' => 'required|in:cash,card',
            'checkoutCart' => 'required|array|min:1',
            'checkoutCart.*.product_id' => 'required|exists:products,id',
            'checkoutCart.*.quantity' => 'required|integer|min:1',
            'discount' => 'required|numeric|min:0|max:100', // Add discount validation
            'total' => 'required|numeric|min:0', // Add total validation
            'deliveryCharge' => 'required|numeric|min:0', // Add delivery charge validation
        ]);
    
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        $uid = uniqid('ORD-');
        $newOrder = Order::create([
            'user_id' => $user->id,
            'uid' => $uid,
            'status' => 1,
            'name' => $validatedData['addressData']['name'],
            'mobile_number' => $validatedData['addressData']['mobile_number'],
            'address_line' => $validatedData['addressData']['address_line'],
            'area' => $validatedData['addressData']['area'],
            'city_id' => $validatedData['addressData']['city_id'],
            'pin_code' => $validatedData['addressData']['pin_code'],
            'payment_type' => $validatedData['paymentData']['payment_type'],
            'total' => 0, // Initialize total
        ]);
    
        $total = 0;
    
        foreach ($validatedData['checkoutCart'] as $cartItem) {
            $product = Product::find($cartItem['product_id']);
            if ($product->stock_quantity < $cartItem['quantity']) {
                return response()->json([
                    'error' => "Insufficient stock for product: {$product->name}"
                ], 400);
            }
    
            $lineTotal = $cartItem['quantity'] * $product->price;
            $total += $lineTotal;
    
            OrderDetail::create([
                'order_id' => $newOrder->id,
                'product_id' => $product->id,
                'quantity' => $cartItem['quantity'],
                'price' => $product->price,
                'total' => $lineTotal,
            ]);
    
            $product->decrement('stock_quantity', $cartItem['quantity']);
        }
    
        // Apply discount
        $discountAmount = $total * ($validatedData['discount'] / 100);
        $totalAfterDiscount = $total - $discountAmount;
        $grandTotal = $totalAfterDiscount + $validatedData['deliveryCharge'];
    
        // Update order total
        $newOrder->update(['total' => $grandTotal]);
    
        return response()->json(['message' => 'Order created successfully!', 'order_id' => $newOrder->id], 200);
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
