@extends('layouts.app') <!-- Extend the layout or master template -->

@section('content')
<style>
       

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
    <h2>Create status</h2>
    <form method="POST" action="{{ route('statuses.store') }}">
        @csrf
        <label for="type">status:</label>
        <input type="text" name="type" id="type" required>
        <br>
        <button type="submit">Create status</button>
    </form>
</body>

@endsection