<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {

        $data = User::get();

        return view('user.index', [
            'data'=>$data
        ]);

    }

    public function showAdd() {
        return view('user.add');
    }

    public function store(Request $request) {

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
            'level'=>$request->level,
            'level'=> 'admin',
            'password' => $validatedData['password']
        ]);
        
        return redirect('/users')->with('success', 'Data Berhasil dibuat');
    }
    
    public function showEdit($id) {

        $user = User::where('id', $id)->get()[0];

        return view('user.edit', [
            'user'=>$user
        ]);
    }

    public function edit(Request $request) {
        /* dd($request->all()); */

        $id = $request->id;

        $validatedData = $request->validate([
            'username' => 'required|min:1|max:12',
            'nama'=> 'required',
            'password' => 'required|min:5|max:255|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $id)->update([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'password' => $validatedData['password']
        ]);

        return redirect('/users')->with('success', 'Data Berhasil diubah');

    }

    public function delete($id) {
     
        User::where('id', $id)->delete();

        return back()->with('success', 'Data Berhasil dihapus');

    }


}
