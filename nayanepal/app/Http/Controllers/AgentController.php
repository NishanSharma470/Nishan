<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // AgentController.php
public function dashboard()
{
    // Your agent dashboard logic here
    return view('agents.dashboard');
}
 
public function create()
{
    $user_id = auth()->user()->id;
    return view('agents.create', compact('user_id')); // Replace 'agents.create' with your actual view name
}

public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:agents',
        'phone_number' => 'required|string',
        'license_number' => 'required|string',
        'office' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'state_province' => 'required|string',
        'country' => 'required|string',
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'user_id' => 'required|exists:users,id', // Assuming profile_image is an image file
    ]);

    // Upload and store the profile image if provided
   
    if ($request->hasFile('profile_image')) 
        {
            //grabbing the photo
            $photo = $request->file('profile_image');
            //$photo_name = $photo->hashName();

            $photo_name = $photo->hashName();
           //uplode the photo
            $path = $photo->move('images/',$photo_name);
        }
        else{
            $photo_name = null;
        }

    // Create a new agent record in the database
    $agent = Agent::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'license_number' => $validatedData['license_number'],
        'office' => $validatedData['office'],
        'address' => $validatedData['address'],
        'city' => $validatedData['city'],
        'state_province' => $validatedData['state_province'],
        'country' => $validatedData['country'],
        'profile_image' => $photo_name,
        'user_id' => $validatedData['user_id'],

    ]);

    // Redirect to a success page or return a response as needed
    return redirect()->route('home', $agent->id)
        ->with('success', 'Agent created successfully');
}

public function index()
{
    $agents = Agent::all(); // Fetch all agents from the database

    return view('agents.index', compact('agents'));
}


}
