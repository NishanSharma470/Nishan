
@extends('layouts.app')

@section('content')


<style>
    /* styles.css */

    /* Style for h4 elements */
    h4 {
        font-family: Arial, sans-serif;
        font-size: 18px; /* Adjust the font size as needed */
        color: white; /* Change the color to your preferred color */
        text-align: center; /* Center align the text */
        font-weight: bold; /* Make the text bold */
        /* Add other font styles as needed */
    }

    /* Style for the paragraph element */
    p {
        font-family: Arial, sans-serif;
        font-size: 16px; /* Adjust the font size as needed */
        color: white; /* Change the color to your preferred color */
        text-align: center; /* Center align the text */
        font-weight: bold; /* Make the text bold */
        /* Add other font styles as needed */
    }

    .img {
        width: 20%;
        height: auto;
        display: block; /* Center align the image */
        margin: 0 auto; /* Center align the image horizontally */

        
    }

    .view-more-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff; /* Button background color */
        color: #fff; /* Button text color */
        font-size: 16px; /* Button font size */
        text-decoration: none;
        border-radius: 5px; /* Button border radius */
        transition: background-color 0.3s ease;
    }

    .view-more-button:hover {
        background-color: #0056b3; /* Hover background color */
    }

    .property-details {
    text-align: center; /* Center-align the content */
    margin-top: 20px; /* Add some space between property details and the button */
}
.view-more-container {
    display: inline-block; /* Display the button inline to make it centered */
}
</style>
<body>
    <!-- Your existing code here -->
    @if ($filteredProperties->isEmpty())
    <p>No properties found matching your criteria.</p>
    @else
    <h4>Search Results</h4>
    <ul>
        @foreach ($filteredProperties as $property)
        <!-- Property details here -->
        <h4>Property Name: {{ $property->property_name }}</h4>

        {{-- Check if $status is not null --}}
        @if ($property->status)
        <h4>Status: {{ $property->status->type }}</h4>
        @else
        <p>Status not available</p>
        @endif

        {{-- Check if $location is not null --}}
        @if ($property->location)
        <h4>Location: {{ $property->location->city }}</h4>
        @else
        <p>Location not available</p>
        @endif

        <!-- Display property image -->
        @if ($property->image)
        <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->property_name }}" class="img">
        @else
        <p>No image available</p>
        @endif
        <div class="view-more-container">
        <a href="{{ url('properties/single_property/' . urlencode($property->id)) }}" class="view-more-button">View more</a>

    </div>
        @endforeach
    </ul>
    @endif
</body>
    </div>
</body>

@endsection
