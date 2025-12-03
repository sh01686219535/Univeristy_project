<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function order(Request $request, $id)
    {
        $userId = Auth::guard('user')->user()->id;
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|digits_between:8,15',
            'email' => 'required|email|max:100',
        ]);

        $property = Property::findOrFail($id);
        if (isset($property)) {
            $order = new Order();
            $order->name = $request->name;
            $order->property_id = $property->id;
            $order->vendor_id = $property->vendor_id;
            $order->user_id = $userId;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->message = $request->message;
            $order->save();
            // ToastMagic::success('Order Submitted successfully!');
            return back();
        }
    }
}
