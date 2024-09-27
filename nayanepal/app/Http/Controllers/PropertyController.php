<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PropertyController extends Controller
{


    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();
        return view('properties.create', compact('categories', 'locations', 'statuses'));
    }

    public function store(PropertyRequest $request)
{
    // Validate the request using the PropertyRequest validation rules

    if ($request->hasFile('image')) 
        {
            //grabbing the photo
            $photo = $request->file('image');
            //$photo_name = $photo->hashName();

            $photo_name = $photo->hashName();
           //uplode the photo
            $path = $photo->move('images/',$photo_name);
        }
        else{
            $photo_name = null;
        }




    // Debugging code


    // Create a new property
    Property::create([
        'property_name' => $request->input('property_name'),
        'category_id' => $request->input('category_id'),
        'location_id' => $request->input('location_id'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'currency' => $request->input('currency'),
        'area' => $request->input('area'),
        'bedrooms' => $request->input('bedrooms'),
        'bathrooms' => $request->input('bathrooms'),
        'status_id' => $request->input('status_id'),
        'date_listed' => $request->input('date_listed'),
        'image' => $photo_name,
    ]);

    // Redirect or return a response as needed
}


public function index()
{
    $properties = Property::all();
    $categories = Category::all();
    $locations = Location::all();
    $statuses = Status::all();

    return view('properties.index', compact('properties', 'categories', 'locations', 'statuses'));
}

public function single_property($id)
{
    $property = Property::find($id);

    $user = auth()->user();

    return view('properties.single_property', ['property' => $property],compact('user'));


    // view(view,[$job]);
}

public function showtourForm()
{
    $properties = Property::all();
    $categories = Category::all();
    $locations = Location::all();
    $statuses = Status::all();
    return view('tour.create');
}

public function search(Request $request)
{
    // Retrieve selected category and location IDs from the request
    $categoryId = $request->input('category_id');
    $locationId = $request->input('location_id');

    // Query properties based on the selected category and location
    $properties = Property::query();

    if ($categoryId) {
        $properties->where('category_id', $categoryId);
    }

    if ($locationId) {
        $properties->where('location_id', $locationId);
    }

    // Retrieve the filtered properties
    $filteredProperties = $properties->get();

    // Fetch all categories and locations for the dropdowns
    $categories = Category::all();

    $locations = Location::all();

    $statuses = Status::all();

    return view('search.index', compact('filteredProperties', 'categories', 'locations', 'statuses'));
}

public function delete_property($id)
{
    $property = Property::find($id);

    if (! $property) {
        return redirect('/properties')->with('msg', 'Property not available.');
    }

    $property->delete();

    return redirect('/properties')->with('msg', 'Property deleted successfully.');
}

public function edit_property_form($id){
    $property = Property::find($id);

    if (! $property) {
        return redirect('/properties')->with('msg', 'Property not available.');
    }

    return view('properties.edit_property_form', ['property' => $property]);
}
public function edit_property(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'property_name' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'location_id' => 'required|integer',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'currency' => 'required|string|max:255',
        'area' => 'required|numeric',
        'bedrooms' => 'required|integer',
        'bathrooms' => 'required|integer',
        'status_id' => 'required|integer',
        'date_listed' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
    ]);

    // Find the model by its ID
    $property = Property::findOrFail($id);

    // Update the model's properties based on the request data
    $property->update([
        'property_name' => $request->input('property_name'),
        'category_id' => $request->input('category_id'),
        'location_id' => $request->input('location_id'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'currency' => $request->input('currency'),
        'area' => $request->input('area'),
        'bedrooms' => $request->input('bedrooms'),
        'bathrooms' => $request->input('bathrooms'),
        'status_id' => $request->input('status_id'),
        'date_listed' => $request->input('date_listed'),
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $photo_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $photo_name);

        // Update the image property in the model
        $property->image = $photo_name;
        $property->save();
    }

    // Redirect or respond as needed after the update
    // You might want to redirect to the property details page or show a success message.
}


}
