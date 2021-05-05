<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credential = $request->only('email','password');

        if(Auth::attempt(['email' => 'admin@the-skills.id', 'password' => 'cnpvak123']))
        {
            return redirect()->route('admin.dashboard');
        }
    }
}
