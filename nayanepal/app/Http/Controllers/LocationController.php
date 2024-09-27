<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        Location::create([
            'city' => $request->input('city'),
        ]);

        return view('agents.dashboard')->with('success', 'Location created successfully.');
    }
}
