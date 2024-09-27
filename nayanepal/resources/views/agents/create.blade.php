@extends('layouts.app') <!-- Use your layout file, if available -->

@section('content')


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Add Agent</h1>
    <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label for="license_number">License Number:</label>
        <input type="text" name="license_number" required>

        <label for="office">Office:</label>
        <input type="text" name="office" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="city">City:</label>
        <input type="text" name="city" required>

        <label for="state_province">State/Province:</label>
        <input type="text" name="state_province" required>

        <label for="country">Country:</label>
        <input type="text" name="country" required>

        <label for="profile_image">Profile Image:</label>
        <input type="file" name="profile_image">

        <input type="hidden" name="user_id" value="{{ $user_id }}">

        <button type="submit">Add Agent</button>
    </form>
</body>

@endsection