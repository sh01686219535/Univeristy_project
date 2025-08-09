<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class FrontendController extends Controller
{
    //frontend home
    // public function home(){
    //     $property = Property::orderBy('id', 'desc')->get();
    //     return view('frontend.home.home',compact('property'));
    // }
    public function home(Request $request)
    {
        $query = Property::query();

        // Filter by Division
        if ($request->filled('division')) {
            $query->where('division', $request->division);
        }

        // Filter by Price Range
        if ($request->filled('price')) {
            $range = explode('-', $request->price);
            if (count($range) === 2) {
                $min = (int) $range[0];
                $max = (int) $range[1];
                $query->whereBetween('price', [$min, $max]);
            }
        }

        $property = $query->orderBy('id', 'desc')->get();

        return view('frontend.home.home', compact('property'));
    }

    //frontend login
    public function login()
    {
        return view('frontend.login');
    }
    //vendorLogin

    public function vendorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // if (isset(Auth::attempt($credentials))) {
        //     // $user = Auth::user();
        //     // if ($user->role == 2) {
        //     //     if ($user->status == 'approved') {
        //     //         return redirect()->intended('dashboard')
        //     //             ->with('success', 'Vendor login successful!');
        //     //     } else {
        //     //         return back()->withErrors(['email' => 'Your registration is pending approval.']);
        //     //     }
        //     // } else {
        //     //     return back()->withErrors(['email' => 'You are not authorized to access this section.']);
        //     // }
        //     return redirect()->intended('dashboard')
        //         ->with('success', 'Vendor login successful!');
        // }
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 2) {
                if ($user->status == 'approved') {
                    return redirect()->intended('dashboard')
                        ->with('success', 'Vendor login successful!');
                } else {
                    Auth::logout();
                    return back()->withErrors(['email' => 'Your registration is pending approval.']);
                }
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'You are not authorized to access this section.']);
            }
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }


    //frontend register
    public function register()
    {
        return view('frontend.register');
    }
    //vendorRegister
    public function vendorRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $vendorUser = new User();
        $vendorUser->name = $request->name;
        $vendorUser->email = $request->email;
        $vendorUser->password = $request->password;
        $vendorUser->status = 'pending';
        $vendorUser->role = '2';
        $vendorUser->save();

        //Vendor 
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->authId = $vendorUser->id;
        $vendor->status = 'pending';
        $vendor->save();

        return redirect('/frontend-login');
    }
    //frontend contact
    public function contact()
    {
        return view('frontend.contact');
    }
    //frontend listing
    public function listing()
    {
        $property = Property::orderBy('id', 'desc')->get();
        return view('frontend.listing', compact('property'));
    }
    //frontend howtoWork
    public function howtoWork()
    {
        return view('frontend.howtoWork');
    }
}
