<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function regist(Request $request)
    {

        /* dd($request->all()); */

        $validatedData = $request->validate([
            'username' => 'required|min:1|max:12|unique:users',
            'nama'=> 'required',
            'password' => 'required|min:5|max:255|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'level'=> 'admin',
            'password' => $validatedData['password']
        ]);

        return redirect('/dashboard')->with('success', 'Account created Successfully!');
    }
}
