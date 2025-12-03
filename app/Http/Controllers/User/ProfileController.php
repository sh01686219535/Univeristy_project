<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //profileIndex
    public function profileIndex()
    {
        $user = Auth::guard('user')->user();
        $users = User::where('id', $user->id)->first();
        return view('user.profile.index', compact('user', 'users'));
    }
    //profileUpdate
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'password' => 'nullable|confirmed',
        ]);

        $user = Auth::guard('user')->user();

        // User update
        $users = User::where('id', $user->id)->first();
        if (isset($users)) {
            $users->name = $request->name;
            $users->phone = $request->phone;
            $users->email = $request->email;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VendorImages'), $imageName);
                $users->image = 'VendorImages/' . $imageName;
            }
            $users->save();
        }
        // ToastMagic::success('Profile updated successfully!');
        return back();
    }
}
