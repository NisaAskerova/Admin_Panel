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
        $this->middleware('auth:sanctum')->only(['add', 'validateData']);
    }
    public function add(Request $request)
    {
        try {
            $validatedData = $request->json()->all();
    
            if (empty($validatedData)) {
                return response()->json(['error' => 'Invalid JSON format'], 400);
            }
    
            // Verilənlərin yoxlanması
            $validatedData = $this->validateData($validatedData);
    
            // İstifadəçi yoxlanması
            $user = auth()->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            // Basket ID-ni tapın və yoxlayın
            $basket = BasketProduct::find($validatedData['basket_id']); // "Basket" modelini istifadə edin
            if (!$basket) {
                return response()->json(['error' => 'The selected basket id is invalid.'], 400);
            }
    
            // Basket ID düzgün olub olmadığını yoxlayın
            if ($basket->user_id !== $user->id) {
                return response()->json(['error' => 'This basket does not belong to the logged-in user.'], 400);
            }
    
            // Order yaratma
            $order = Order::create([
                'user_id' => $user->id,
                'uid' => uniqid('ORD-'), // Yunik order ID
                'basket_id' => $validatedData['basket_id'], // Basket ID (Sepet)
                'status' => 1, // Sifarişin başlanğıc statusu
                'name' => $validatedData['addressData']['name'],
                'mobile_number' => $validatedData['addressData']['mobile_number'],
                'address_line' => $validatedData['addressData']['address_line'],
                'area' => $validatedData['addressData']['area'],
                'city_id' => $validatedData['addressData']['city_id'],
                'pin_code' => $validatedData['addressData']['pin_code'],
                'payment_type' => $validatedData['paymentData']['payment_type'], // Ödəmə növü
                'total' => 0, // İlk olaraq ümumi məbləğ sıfır
                'is_default' => false, // Varsayılan olaraq false
            ]);
    
            // Order detalları və ümumi məbləğ hesablanması
            $total = 0;
            foreach ($validatedData['checkoutCart'] as $cartItem) {
                $product = Product::findOrFail($cartItem['product_id']);
    
                // Məhsulun stokunun yoxlanması
                if ($product->stock_quantity < $cartItem['quantity']) {
                    return response()->json(['error' => "Insufficient stock for product: {$product->name}"], 400);
                }
    
                // Məhsulun qiymətinin hesablanması
                $lineTotal = $product->price * $cartItem['quantity'];
                $total += $lineTotal;
    
                // Order detalları əlavə edilir
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cartItem['quantity'],
                    'price' => $product->price,
                    'total' => $lineTotal,
                ]);
    
                // Stok miqdarı yenilənir
                $product->decrement('stock_quantity', $cartItem['quantity']);
            }
    
            // Endirim və ümumi məbləğin hesablanması
            $discountAmount = $total * ($validatedData['discount'] / 100);
            $grandTotal = $total - $discountAmount + $validatedData['deliveryCharge'];
    
            // Order məlumatlarının yenilənməsi
            $order->update(['total' => $grandTotal]);
    
            return response()->json(['message' => 'Order created successfully!', 'order_id' => $order->id], 200);
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
            'paymentData.payment_type' => 'required|in:cash,card', // 'cash' və 'card' dəyərləri
            'checkoutCart' => 'required|array|min:1',
            'checkoutCart.*.product_id' => 'required|exists:products,id',
            'checkoutCart.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'deliveryCharge' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
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
