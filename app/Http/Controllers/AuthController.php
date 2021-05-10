<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $token = '220700';
        if($request->token != $token){
            return redirect()->route('admin.welcome')->with('message','Token invalid!!');
        }
        $credential = $request->only('email','password');

        if(Auth::attempt($credential))
        {
            return redirect()->route('admin.dashboard');
        }

        return  redirect()->route('admin.welcome')->with('message','We are cannot find your credential in our records');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('admin.welcome');
    }
}
