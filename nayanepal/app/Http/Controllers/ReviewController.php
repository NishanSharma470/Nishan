<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Property;
USe App\Models\User;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($property_id)
    {
        // Retrieve the property based on the $property_id
        $property = Property::find($property_id); // Replace 'Property' with your actual model name
    
        // Pass the $property to the view
        return view('reviews.create', compact('property'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id', // Assuming "properties" is your property model
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Create a new rating
        $review = Review::create($validatedData);

        // You can perform additional actions like calculating averages, updating property ratings, etc., here.

        return redirect()->route('properties.index')
            ->with('success', 'Rating and comment submitted successfully');
    }

    public function index($property_id)
{
    $property = Property::findOrFail($property_id); // Find the property by ID
    $reviews = Review::where('property_id', $property_id)->get(); // Fetch reviews for the property

    return view('reviews.index', compact('property', 'reviews'));
}
public function allReviews()
{
    $reviews = Review::all(); // Retrieve all reviews
    return view('reviews.allReviews', compact('reviews'));
}  
    
}
