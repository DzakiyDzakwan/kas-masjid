<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index() {
        return view('login');
    }

    public function auth(Request $request) {


        $credential = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credential)) {
            return redirect()->intended('/dashboard');
        } else {
            return back()->with('errors', 'Login Fail');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
