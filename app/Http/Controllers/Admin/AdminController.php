<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Contact;
use App\Models\Admin\Order;
use App\Models\Admin\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //dashboard 
    public function dashboard(){
        $order = Order::count();
        $property = Property::count();
        $vendor = Vendor::count();
        $contact = Contact::count();
        return view('admin.home.home',compact('order','property','vendor','contact'));
    } 
    //login
    public function login(){
        return view('admin.home.login');
    }
    //adminloginSubmit
    public function adminloginStore(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $check = $request->all();
        $data = [
            'email'=>$check['email'],
            'password'=>$check['password'],
        ];
        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }
    // logout
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('home')->with('success','Admin Logout Successfully');
    }
    //vendorList
    public function vendorList(){
        $vendor = Vendor::latest()->get();
        return view('admin.vendor.index',compact('vendor'));
    }
    //vendorDelete
    public function vendorDelete($id){
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        $vendor->save();
        return back()->with('success','Vendor Deleted Successfully');
    }
}
