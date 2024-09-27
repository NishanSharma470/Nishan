@extends('layouts.app')

@section('content')
<title>Reviews for {{ $property->property_name }}</title>
    <style>
        

        h2 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent background color */
            border-radius: 5px;
        }

        strong {
            color: white; /* Set strong text color to white */
        }
    </style>
<body>
    <div class="container">
        <h2>Reviews for {{ $property->property_name }}</h2>
        
        @if ($reviews->isEmpty())
            <p>No reviews for this property yet.</p>
        @else
            <ul>
                @foreach ($reviews as $review)
                    <li>
                    <strong>Username:</strong> {{ $review->user->name }}<br>
                        <strong>Rating:</strong> {{ $review->rating }}<br>
                        <strong>Comment:</strong> {{ $review->comment }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
@endsection
