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
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required',
            'address_line' => 'required',
            'area' => 'required',
            'city_id' => 'required|exists:cities,id',
            'pin_code' => 'required',
            'payment_type' => 'required|in:cash,card',
        ]);
    
        $user = auth()->user();
        $basket = $user->basket; 
    
        if (!$basket || $basket->products->isEmpty()) {
            return redirect()->back()->withErrors('Your basket is empty.');
        }
    
        $uid = uniqid('ORD-');
        $newOrder = new Order([
            'user_id' => $user->id,
            'basket_id' => $basket->id,
            'uid' => $uid,
            'status' => 1, // Pending
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'address_line' => $request->address_line,
            'area' => $request->area,
            'city_id' => $request->city_id,
            'pin_code' => $request->pin_code,
            'payment_type' => $request->payment_type,
            'total' => 0,
        ]);
        $newOrder->save();
    
        $total = 0;
    
        foreach ($basket->products as $basketProduct) {
            $product = Product::find($basketProduct->product_id);
    
            if (!$product || $product->stock_count < $basketProduct->stock_count) {
                return redirect()->back()->withErrors("Insufficient stock for product: {$product->name}");
            }
    
            $lineTotal = $basketProduct->stock_count * $product->price;
            $total += $lineTotal;
    
            OrderDetail::create([
                'order_id' => $newOrder->id,
                'product_id' => $product->id,
                'quantity' => $basketProduct->stock_count,
                'price' => $product->price,
                'total' => $lineTotal,
            ]);
    
            $product->decrement('stock_count', $basketProduct->stock_count);
        }
    
        $newOrder->update(['total' => $total]);
    
        $basket->products()->delete(); // Səbəti təmizlə
    
        if ($request->payment_type === 'card') {
            return view('payment', compact('total', 'newOrder'));
        }
    
        return redirect()->route('user.order.index')->with('success', 'Order created successfully.');
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
