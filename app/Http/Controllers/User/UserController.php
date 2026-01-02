<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Devrabiul\ToastMagic\Facades\ToastMagic;


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
            ToastMagic::success('Login successfully!');
            return redirect()->route('user.order');
        } else {
            ToastMagic::error('Invalid Credentials!');
            return redirect()->back();
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
        Auth::guard('user')->login($user);
        ToastMagic::success('Login successfully!');
        return redirect()->route('user.dashboard');
    }
    //userLogout
    public function userLogout() {
        Auth::guard('user')->logout();
        ToastMagic::success('User Logout Successfully!');
        return redirect()->route('home');
    }
}
