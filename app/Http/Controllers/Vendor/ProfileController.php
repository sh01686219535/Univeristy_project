<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //profileIndex
    public function profileIndex()
    {
        $vendor = Auth::guard('vendor')->user();
        return view('vendor.profile.index', compact( 'vendor'));
    }
    //profileUpdate


    public function profileUpdate(Request $request)
    {
        $request->validate([
            'password' => 'nullable|confirmed',
        ]);
        $vendorId = Auth::guard('vendor')->user()->id;
        // Vendor update
        $vendor = Vendor::where('id', $vendorId)->first();
        if (isset($vendor)) {
            $vendor->name = $request->name;
            $vendor->phone = $request->phone;
            $vendor->email = $request->email;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VendorImages'), $imageName);
                $vendor->image = 'VendorImages/' . $imageName;
            }
            $vendor->save();
        }

        // ToastMagic::success('Profile updated successfully!');
        return back();
    }
}
