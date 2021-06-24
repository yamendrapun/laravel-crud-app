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

    public function check (Request $request)
    {
        // validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address!');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedInUser', $userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail', 'Your password is incorrect!');
            }
        }
    }

    public function logout ()
    {
        if(session()->has('LoggedInUser')){
            session()->pull('LoggedInUser');
            return redirect('/auth/login');
        }
    }

    public function dashboard ()
    {
        $data = ['LoggedInUserInfo' => Admin::where('id', '=', session('LoggedInUser'))->first()];
        return view('admin/dashboard', $data);
    }
}
