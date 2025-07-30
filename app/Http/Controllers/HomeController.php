<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //login
    public function login(){
        return view("backend.admin.login");
    }
    //register
    public function register(){
        return view("backend.admin.register");
    }
    //dashboard
    public function dashboard(){
        $order = Order::count('id');
        $property = Property::count('id');
        $vendor = Vendor::count('id');
        return view("backend.admin.home",compact('order','property','vendor'));
    }
}
