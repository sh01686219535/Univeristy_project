<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Property;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorUserController extends Controller
{
    //dashboard
    public function dashboard(){
        $order = Order::count('id');
        $property = Property::count('id');
        $vendor = Vendor::count('id');
        $contact = Contact::count('id');
        return view("vendor.auth.home",compact('order','property','vendor','contact'));
    }
}
