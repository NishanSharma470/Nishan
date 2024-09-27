<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Property;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
{
    if (Auth::check()) {
        $user = Auth::user();

        // Check the user's role
        if ($user->role->name === 'agent') {
            //return redirect('agent.dashboard');
            return redirect()->route('agent.dashboard');
                    
        } elseif ($user->role->name === 'user') {
            $properties = Property::all();
            return redirect()->route('properties.index');

           // return redirect('user.dashboard'); // Redirect users to the user dashboard
        }
    }

    return redirect('/login'); // Redirect unauthenticated users to the login page
}

public function index()
    {
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();
        // Fetch property listings (adjust as per your data structure)
        $properties = Property::all(); // Change this to fetch your properties

        // Pass the properties data to the view
        return view('home',compact('properties', 'categories', 'locations', 'statuses'));
    }
}
