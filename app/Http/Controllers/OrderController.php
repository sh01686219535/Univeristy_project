<?php

namespace App\Http\Controllers;

use App\Mail\OrderApprovedMail;
use App\Mail\OrderCancelledMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            $order->property_id = $property->id;
            $order->vendor_id = $property->vendor_id;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->message = $request->message;
            $order->save();
            // ToastMagic::success('Order Submitted successfully!');
            return back();
        }
    }
    // order index
    public function orderIndex()
    {
        $authId = Auth::user()->id;
        $vendor = Vendor::where('authId', $authId)->first();
        if (isset($vendor)) {
            $order = Order::where('vendorId', $vendor->id)->orderBy('id', 'desc')->paginate(10);
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
        // ToastMagic::success('Order Deleted successfully!');
        return back();
    }
    //orderProperty
    public function orderProperty($id)
    {
        $order = Order::findOrFail($id);
        $property = Property::where('id', $order->property_id)->first();
        $categories = Category::all();
        return view('backend.order.property_details', compact('property', 'categories'));
    }

     public function orderApprove($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();

        $vendor = Vendor::find($order->vendor_id);

        // Send mails
        if ($order->email) {
            Mail::to($order->email)->send(new OrderApprovedMail($order));
        }

        if ($vendor && $vendor->email) {
            Mail::to($vendor->email)->send(new OrderApprovedMail($order));
        }

        return redirect()->back()->with('success', 'Order approved and emails sent successfully!');
    }

    //  Cancel Order
    public function orderCancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'cancel';
        $order->save();

        $vendor = Vendor::find($order->vendor_id);

        // Send mails
        if ($order->email) {
            Mail::to($order->email)->send(new OrderCancelledMail($order));
        }

        if ($vendor && $vendor->email) {
            Mail::to($vendor->email)->send(new OrderCancelledMail($order));
        }

        return redirect()->back()->with('error', 'Order cancelled and emails sent.');
    }
}
