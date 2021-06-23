<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }
    
    public function register ()
    {
        return view('auth.register');
    }

    public function save (Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:5'
        ]);

        // insert data into database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return back()->with('success', 'New User has been successfully added to database');
        }else{
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
}
