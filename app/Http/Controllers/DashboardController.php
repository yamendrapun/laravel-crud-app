<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $admin = Admin::where('id', '=', session('LoggedInUser'))->first();
        return view('admin.dashboard', ['admin' => $admin]);
    }
}
