<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    //dashboard
    public function dashboard()
    {
        return view('user.home.home');
    }
    //login
    public function login()
    {
        return view('user.home.login');
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
        if (Auth::guard('user')->attempt($data)) {
            return redirect()->route('user.order');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
    //register
    public function register()
    {
        return view('user.home.register');
    }
    //registerStore
    public function registerStore(Request $request) {
         $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|max:255|email|unique:users,email',
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.dashboard');
    }
    //userLogout
    public function userLogout() {
        Auth::guard('user')->logout();
        return redirect()->route('home')->with('success', 'User Logout Successfully');
    }
}
