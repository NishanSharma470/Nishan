<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        Status ::create([
            'type' => $request->input('type'),
        ]);

        return view('agents.dashboard')->with('success', 'category created successfully.');
    }
}
