<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
       // 1. Ödənişi yarat
       public function createPayment(Request $request)
       {
           $payment = Payment::create([
               'order_id' => $request->order_id,
               'user_id' => $request->user_id,
               'status' => $request->status,
               'type' => $request->type
           ]);
   
           return response()->json(['success' => true, 'payment' => $payment]);
       }
   
       // 2. Ödəniş məlumatlarını göstər
       public function getPayment($order_id)
       {
           $payment = Payment::where('order_id', $order_id)->first();
           return response()->json(['payment' => $payment]);
       }
}
