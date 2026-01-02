<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function vendorView()
    {
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
       $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

      if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator, 'registerErrors')
            ->withInput();
    }
        if (Auth::guard('vendor')->attempt($request->only('email', 'password'))) {
            ToastMagic::success('Login successfully');
            return redirect()->route('vendor.dashboard');
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'], 'loginErrors');
    }

    //register
    public function register()
    {
        return view('vendor.home.register');
    }
    //registerStore
    public function registerStore(Request $request)
    {
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
        ToastMagic::success('Login successfully');
        return redirect()->route('vendor.dashboard');
    }
}
