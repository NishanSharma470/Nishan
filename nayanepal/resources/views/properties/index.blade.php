@extends('layouts.app') <!-- Extend the layout or master template -->

@section('content')

<style>
    /* Reset some default styles and provide a basic layout */
    /* Style for the slider container */
    .slider-container {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center content horizontally */
        text-align: center;
    }

    /* Style for the slider itself */
    .slider {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center content horizontally */
        transition: transform 0.5s ease;
    }

    /* Style for each slide */
    .slide {
        width: 100%;
        max-width: 600px; /* Adjust the max-width as needed */
        padding: 10px;
        text-align: center;
        color: white;
    }

    /* Style for slide images */
    .slide img {
        max-width: 100%;
        height: auto;
    }

    /* Optional: Style for slide captions, add more styles as needed */
    .slide h4 {
        font-size: 18px;
        margin: 0;
        color: white;
    }

    .slide p {
        font-size: 16px;
        margin: 0;
    }

    /* Add this CSS to your existing styles */
    .view-more-container {
        text-align: center; /* Center content horizontally */
        margin-top: 20px; /* Add some top margin for spacing */
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
</style>

<!-- Your head content here -->

   <script>
    document.addEventListener("DOMContentLoaded", function () {
        const sliderContainer = document.querySelector(".slider");
        const slides = document.querySelectorAll(".slide");
        let currentIndex = 0;

        // Function to move to the next slide
        function nextSlide() {
            slides[currentIndex].classList.remove("active");
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.add("active");
        }

        // Automatically advance to the next slide every 5 seconds
        setInterval(nextSlide, 5000);
    });
</script>


<main>

    <h2>{{ session('msg') }}</h2>

    <div class="slider">
        <h1>All properties</h1>
        @forelse($properties as $property)
            <div class="slide @if ($loop->first) active @endif">
                <!-- Property details here -->
                @if ($property->image)
                    <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->property_name }}">
                @endif

                <h4>Property Name: {{ $property->property_name }}</h4>

                @if ($property->status)
                    <h4>Status: {{ $property->status->type }}</h4>
                @endif

                @if ($property->location)
                    <h4>Location: {{ $property->location->city }}</h4>
                @endif

                <!-- Update the link to point to the property's details -->
                <div class="view-more-container">
                <a href="properties/single_property/{{ $property->id }}" class="view-more-button">View more</a>
                </div>
            </div>
        @empty
            <!-- Handle empty properties list -->
        @endforelse
    </div>
    <hr>
</main>

@endsection
