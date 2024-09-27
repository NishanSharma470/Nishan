<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Property;
use App\Models\user;



class AppointmentController extends Controller
{
    public function create($property_id, $user_id)
    {
        // Retrieve the property based on the $property_id
        $property = Property::find($property_id); // Replace 'Property' with your actual model name
    
        

        // Pass the $property to the view
        return view('appointments.create', compact('property', 'user_id'));
    }
    
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'meeting_location' => 'required|string|max:255',
            'duration' => 'required|integer',
            'purpose' => 'required|string',
            'attendees' => 'required|string',
            'date_time' => 'required|date|after:now',
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id', // Assuming "properties" is your property model
        ]);

        // Create a new appointment
        $appointment = Appointment::create($validatedData);

        // You can perform additional actions like sending emails or notifications here.

        return redirect()->route('home')
            ->with('success', 'Appointment created successfully');
    }

    public function index()
{
    // Fetch all appointments with their associated properties
    $appointments = Appointment::with('property')->get();

    // Pass the data to the view
    return view('appointments.index', compact('appointments'));
}

}
