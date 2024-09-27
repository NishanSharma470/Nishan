@extends('layouts.app')

@section('content')
    <style>
        /* Center-align the content */
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        /* Style for the list of reviews */
        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            background-color: #f5f5f5;
            text-align: left;
        }

        /* Style for review details */
       

        /* Style for "No reviews found" message */
        .no-reviews {
            font-size: 18px;
            color: white;
        }
    </style>

    <div class="center-content">
        <h2>All Reviews</h2>

        @if ($reviews->isEmpty())
            <p class="no-reviews">No reviews found.</p>
        @else
            <ul>
                @foreach ($reviews as $review)
                    <li>
                        <strong>User:</strong> {{ $review->user->name }}<br>
                        <strong>Property:</strong> {{ $review->property->property_name }}<br>
                        <strong>Rating:</strong> {{ $review->rating }}<br>
                        <strong>Comment:</strong> {{ $review->comment }}<br>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

