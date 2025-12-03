<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Order;
use App\Models\Admin\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
     public function order(Request $request, $id)
    {
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
        $vendorId = Auth::guard('user')->user()->id;
        if (isset($vendorId)) {
            $order = Order::where('vendor_id', $vendorId)->orderBy('id', 'desc')->paginate(10);
            return view('user.order.index', compact('order'));
        } else {
            $order = Order::orderBy('id', 'desc')->paginate(10);
            return view('user.order.index', compact('order'));
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
        return view('user.order.property_details', compact('property', 'categories'));
    }

    // public function orderApprove($id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->status = 'approved';
    //     $order->save();

    //     $vendor = Vendor::find($order->vendor_id);

    //     // Send mails
    //     if ($order->email) {
    //         Mail::to($order->email)->send(new OrderApprovedMail($order));
    //     }

    //     if ($vendor && $vendor->email) {
    //         Mail::to($vendor->email)->send(new OrderApprovedMail($order));
    //     }

    //     return redirect()->back()->with('success', 'Order approved and emails sent successfully!');
    // }

    //  Cancel Order
    // public function orderCancel($id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->status = 'cancel';
    //     $order->save();

    //     $vendor = Vendor::find($order->vendor_id);

    //     // Send mails
    //     if ($order->email) {
    //         Mail::to($order->email)->send(new OrderCancelledMail($order));
    //     }

    //     if ($vendor && $vendor->email) {
    //         Mail::to($vendor->email)->send(new OrderCancelledMail($order));
    //     }

    //     return redirect()->back()->with('error', 'Order cancelled and emails sent.');
    // }
    //orderEdit
    public function orderEdit($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.edit', compact('order'));
    }
    //orderUpdate
    public function orderUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->name = $request->name;
        // $order->property_id = $property->id;
        // $order->vendor_id = $property->vendor_id;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->status = '';
        $order->message = $request->message;
        $order->save();
        // ToastMagic::success('Order Submitted successfully!');
        return redirect()->route('user.order')->with('success', 'Order Update Successfully');
    }
}
