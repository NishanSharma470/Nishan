
@extends('layouts.app') <!-- Use your layout file, if available -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
   <style>
    /* CSS Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    font-size: 18px;
    cursor: pointer;
}

.error-message {
    color: #ff0000;
    font-size: 14px;
}

   </style>



</head>

<body>
    <div class="container">
        <h2>Book an Appointment</h2>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf <!-- Add a CSRF token for form submission security -->
    
            <input type="hidden" name="property_id" value="{{ $property->id }}">

            <div>
            <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
            </div>
    
            <div class="form-group">
                <label for="meeting_location">Meeting Location:</label>
                <input type="text" id="meeting_location" name="meeting_location" required>
                @error('meeting_location')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="duration">Duration (in minutes):</label>
                <input type="number" id="duration" name="duration" required>
                @error('duration')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="purpose">Purpose:</label>
                <input type="text" id="purpose" name="purpose" required>
                @error('purpose')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_time">date_time:</label>
                <input type="datetime-local" id="date_time" name="date_time" required>
                @error('date_time')
        <div class="text-danger">{{ $message }}</div>
    @enderror
            </div>
            <div class="form-group">
                <label for="attendees">Attendees:</label>
                <input type="text" id="attendees" name="attendees" required>
                @error('attendees')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- This assumes that property_id is an integer field. -->
    
            <div class="form-group">
                <input type="submit" value="Book Appointment">
            </div>
        </form>
    </div>
</body>
</html>
@endsection