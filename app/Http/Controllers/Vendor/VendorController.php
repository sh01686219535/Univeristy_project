<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Advertisement;
use App\Models\Admin\Order;
use App\Models\Admin\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class VendorController extends Controller
{
    //dashboard
    public function dashboard()
    {
        $vedorId = Auth::guard('vendor')->user()->id;
        $order = Order::where('vendor_id', $vedorId)->count();
        $property = Property::where('vendor_id', $vedorId)->count();
        $advertisement = Advertisement::where('vendor_id', $vedorId)->count();
        return view('vendor.home.home', compact('order', 'property', 'advertisement'));
    }
    //login
    public function login()
    {
        return view('vendor.home.login');
    }
    //loginStore
    // public function loginStore(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     $check = $request->all();
    //     $data = [
    //         'email' => $check['email'],
    //         'password' => $check['password'],
    //     ];
    //     if (Auth::guard('vendor')->attempt($data)) {

    //         return redirect()->route('vendor.dashboard');
    //     } else {
    //         return redirect()->back()->with('error', 'Invalid Credentials');
    //     }
    // }
    // loginStore
    public function loginStore(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('vendor')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'status'   => 1, // ✅ only active vendors
        ])) {
            ToastMagic::success('Login successfully!');
            return redirect()->route('vendor.dashboard');
        }
        ToastMagic::error('Your account is pending approval or credentials are invalid!');
        return redirect()->back();
    }

    //register
    public function register()
    {
        return view('vendor.home.register');
    }
    //registerStore
    public function registerStore(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:vendors,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        $vendor->save();

        // Auth::guard('vendor')->login($vendor);
        // return redirect()->route('vendor.dashboard');
        ToastMagic::success('Vendor Registration successfully!');
        return back();
    }
    // logout
    public function VendorLogout()
    {
        Auth::guard('vendor')->logout();
        ToastMagic::success('Vendor Logout successfully!');
        return redirect()->route('home');
    }
    //vendorApprove
    public function vendorApprove($id){
        $vendor = Vendor::findOrFail($id);
        $vendor->status = 1;
        $vendor->save();
        ToastMagic::success('Vendor Approved successfully!');
        return back();
    }
    //vendorCancel
     public function vendorCancel($id){
        $vendor = Vendor::findOrFail($id);
        $vendor->status = 0;
        $vendor->save();
        ToastMagic::success('Vendor Canceled successfully!');
        return back();
    }
}
