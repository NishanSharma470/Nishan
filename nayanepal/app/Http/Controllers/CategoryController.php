<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categorys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        Category ::create([
            'type' => $request->input('type'),
        ]);

        return view('agents.dashboard')->with('success', 'category created successfully.');
    }
}
