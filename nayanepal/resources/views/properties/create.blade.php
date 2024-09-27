
@extends('layouts.app') <!-- Use your layout file, if available -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add properties</title>
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
    <h2>Add properties</h2>
<form method="POST" action="/create" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="property_name">Property Name:</label>
        <input type="text" name="property_name" id="property_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Select Category</option>
            <!-- Loop through categories from your database -->
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->type }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="location_id">Location:</label>
        <select name="location_id" id="location_id" class="form-control" required>
            <option value="">Select Location</option>
            <!-- Loop through locations from your database -->
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->city }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="currency">Currency:</label>
        <input type="text" name="currency" id="currency" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="area">Area (sqft):</label>
        <input type="number" name="area" id="area" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="bedrooms">Bedrooms:</label>
        <input type="number" name="bedrooms" id="bedrooms" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="bathrooms">Bathrooms:</label>
        <input type="number" name="bathrooms" id="bathrooms" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="status_id">Status:</label>
        <select name="status_id" id="status_id" class="form-control" required>
            <option value="">Select Status</option>
            <!-- Loop through statuses from your database -->
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->type }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="date_listed">Date Listed:</label>
        <input type="date" name="date_listed" id="date_listed" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Create Property</button>
</form>
</div>
</body>
</html>
@endsection
