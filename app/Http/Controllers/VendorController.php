<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class VendorController extends Controller
{
    //index
    public function index()
    {
        $vendor = User::where('role', '2')->get();
        return view('backend.vendor.index', compact('vendor'));
    }
    //vendorApprove
    public function vendorApprove($id)
    {
        //user update
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();
        //vendor update
        $vendor = Vendor::where('authId',$user->id)->first();
        $vendor->status = 'approved';
        $vendor->save();

        ToastMagic::success('Vendor Approved successfully!');
        return back();
    }
    //vendorDelete
    public function vendorDelete(Request $request, $id)
    {
        $vendor = User::findOrFail($id);
        $vendor->delete();
        ToastMagic::success('Vendor Deleted successfully!');
        return back();
    }
    //profileIndex
    public function profileIndex()
    {
        $user = Auth::user();
        $vendor = Vendor::where('authId', $user->id)->first();
        return view('backend.vendor.profile', compact('user', 'vendor'));
    }
    //profileUpdate


    public function profileUpdate(Request $request)
    {
        $request->validate([
            'password' => 'nullable|confirmed',
        ]);

        $user = Auth::user();

        // Vendor update
        $vendor = Vendor::where('authId', $user->id)->first();
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


        // User update
        $authUser = User::find($user->id);
        $authUser->name = $request->name;
        $authUser->email = $request->email;

        // ✅ Only update password if provided
        if ($request->filled('password')) {
            $authUser->password = Hash::make($request->password);
        }

        $authUser->save();

        ToastMagic::success('Profile updated successfully!');
        return back();
    }
}
