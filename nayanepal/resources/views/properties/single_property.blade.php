@extends('layouts.app') <!-- Use your layout file, if available -->

@section('content')
<head>
  <style>
    /* styles.css */
.container {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    min-height: 100vh; /* Full viewport height */
}

.center-content {
    display: flex;
    flex-direction: column; /* Stack items vertically */
    text-align: center; /* Center text horizontally */
}

/* Add this CSS to your external CSS file or in a <style> tag in your HTML document */
.property-details {
    color: white; /* Change to white color */
}

/* Optionally, you can change the color of links within the property details */
.property-details a {
    color: white; /* Change to your desired link color */
}

/* Style for the buttons */
/* Style for the buttons */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff; /* Button background color */
    color: #fff; /* Button text color */
    font-size: 16px; /* Button font size */
    text-decoration: none;
    border: none;
    border-radius: 5px; /* Button border radius */
    cursor: pointer; /* Change cursor to pointer on hover */
    transition: background-color 0.3s ease;
    margin-right: 10px; /* Add margin between buttons */
}

/* Change button background color on hover */
.button:hover {
    background-color: #0056b3; /* Hover background color */
}


/* Add any other styles as needed */

  </style> 
    <!-- Add your CSS styles here -->
    
</head>
<body>
    
    
     <!-- Add this anchor tag below your property details -->

     <div class="container">
        <div class="center-content">
            <div class="property-image">
                @if ($property->image)
                    <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->Name }}">
                @else
                    No image available
                @endif
            </div>
            <div class="property-details">
                <h2>Property Details</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Property Name:</strong> {{ $property->property_name }}</h5>
                        <p class="card-text"><strong>Category:</strong> {{ $property->category->type }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ $property->location->city }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $property->description }}</p>
                        <p class="card-text"><strong>Price:</strong> {{ $property->price }}</p>
                        <p class="card-text"><strong>Currency:</strong> {{ $property->currency }}</p>
                        <p class="card-text"><strong>Area (sqft):</strong> {{ $property->area }}</p>
                        <p class="card-text"><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                        <p class="card-text"><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $property->status->type }}</p>
                        <p class="card-text"><strong>Date Listed:</strong> {{ $property->date_listed }}</p>
                    </div>
                </div>
                     <!-- Other property details -->
                            @if (Auth::check())
                          {{-- Check if the user is authenticated --}}
    
                             @if (auth()->user()->role->name === 'agent')
                                  {{-- Check if the user's role is 'agent' --}}
        
                             <a href="/delete_property/{{ $property->id }}">Delete</a>
                             <a href="{{ route('properties.edit.form', ['id' => $property->id]) }}">Edit</a>

                                 {{-- Display the "Add property" link for agents --}}
        
    @endif
@endif
                <a href="{{ route('appointments.create', ['property_id' => $property->id,'user_id' => $user->id]) }}" class = "button , .button:hover">Make an Appointment</a>
                <a href="{{ route('reviews.create', ['property_id' => $property->id]) }}" class = "button , .button:hover">Give your review</a>
                <a href="{{ route('properties.reviews.index', ['property_id' => $property->id]) }}" class = "button , .button:hover">View Reviews</a>
            </div>
        </div>
    </div>
    <!-- Add navigation or additional content here -->
</body>

</html>
@endsection
