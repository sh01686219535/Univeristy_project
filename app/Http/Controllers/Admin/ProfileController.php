<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class ProfileController extends Controller
{
    //profileIndex
    public function profileIndex()
    {
        $user = Auth::guard('admin')->user();
        $admin = Admin::where('id', $user->id)->first();
        return view('admin.profile.index', compact('user', 'admin'));
    }
    //profileUpdate


    public function profileUpdate(Request $request)
    {
        $request->validate([
            'password' => 'nullable|confirmed',
        ]);

         $user = Auth::guard('admin')->user();

        // Vendor update
       $admin = Admin::where('id', $user->id)->first();
        if (isset($admin)) {
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VendorImages'), $imageName);
                $admin->image = 'VendorImages/' . $imageName;
            }
            $admin->save();
        }
        ToastMagic::success('Profile updated successfully!');
        return back();
    }
}
