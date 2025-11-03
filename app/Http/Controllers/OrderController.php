<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //order
    public function order(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $property = Property::findOrFail($id);
        if (isset($property)) {
            $order = new Order();
            $order->name = $request->name;
            $order->propertyId = $property->id;
            $order->vendorId = $property->vendorId;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->message = $request->message;
            $order->save();
            ToastMagic::success('Order Submitted successfully!');
            return back();
        } else {
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->message = $request->message;
            $order->save();
            ToastMagic::success('Order Submitted successfully!');
            return back();
        }
    }
    // order index
    public function orderIndex()
    {
        $authId = Auth::user()->id;
        $vendor = Vendor::where('authId', $authId)->first();
        if (isset($vendor)) {
            $order = Order::where('vendorId',$vendor->id)->orderBy('id', 'desc')->paginate(10);
            return view('backend.order.index', compact('order'));
        } else {
            $order = Order::orderBy('id', 'desc')->paginate(10);
            return view('backend.order.index', compact('order'));
        }
    }
    //orderDelete
    public function orderDelete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        ToastMagic::success('Order Deleted successfully!');
        return back();
    }
}
