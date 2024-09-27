<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
{
    // Your agent dashboard logic here
    return view('agents.dashboard');
}
}
