<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function vendorView(){
        return view('frontend.vendor.index');
    }
     //login
    public function login()
    {
        return view('vendor.home.login');
    }
    //loginStore
    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];
        if (Auth::guard('vendor')->attempt($data)) {
            return redirect()->route('vendor.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
    //register
    public function register()
    {
        return view('vendor.home.register');
    }
    //registerStore
    public function registerStore(Request $request) {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|max:255|email|unique:vendors,email',
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        $vendor->save();
        return redirect()->route('vendor.dashboard');
    }
}
