@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Property</h2>
    <form method="POST" action="{{ route('properties.update', ['id' => $property->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property->property_name }}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> category_id}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> location_id}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> description}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> price}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> currency}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> area}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> bedrooms}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> bathrooms}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> status_id}}" required>
        </div>

        <div class="form-group">
            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property-> date_listed}}" required>
        </div>


        <!-- Add other form fields for editing property details here -->

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>
</div>
@endsection
