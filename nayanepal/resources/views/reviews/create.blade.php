@extends('layouts.app') <!-- You may need to adjust the layout based on your application -->

@section('content')
<style>
         

        .container {
            text-align: center;
            background-color: #fff; /* Set the container background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px; /* Adjust the maximum width as needed */
        }
        .container {
            text-align: center;
        }
        h2 {
            color: #333; /* Set the heading color */
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            color: #333; /* Set the label color */
        }

        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff; /* Set the button background color */
            color: #fff; /* Set the button text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Set the button background color on hover */
        }

        /* Additional styles can go here */
    </style>
<body>
<body>
    <div class="container">
        <h2>Create a Review</h2>
        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf <!-- CSRF protection -->
            <input type="hidden" name="property_id" value="{{ $property->id }}">
    
            <!-- You can use a hidden input field to pass the authenticated user's ID -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
            </div>
    
            <div class="form-group">
                <label for="comment">Comment (optional):</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" maxlength="255"></textarea>
            </div>
    
            <button type="submit">Submit Review</button>
        </form>
    </div>
</body>
@endsection
