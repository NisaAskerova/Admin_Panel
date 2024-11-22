<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    // 1. Sifariş yarat
    public function createOrder(Request $request)
    {
        // Sifarişi yaradın
        $order = Order::create([
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'uid' => uniqid(),
            'basket_id' => $request->basket_id,
            'status' => 0 // Yeni sifariş
        ]);

        // Sifariş detalları əlavə edin
        foreach ($request->products as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'total' => $product['quantity'] * $product['price']
            ]);
        }

        return response()->json(['success' => true, 'order' => $order]);
    }

    // 2. Sifariş detalları göstər
    public function getOrderDetails($order_id)
    {
        $orderDetails = OrderDetail::with('product')->where('order_id', $order_id)->get();
        return response()->json(['orderDetails' => $orderDetails]);
    }
}
