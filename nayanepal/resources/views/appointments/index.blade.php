@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Appointments with Property Names</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>contract_number</th>
                    <th>Property Name</th>
                    <th>Meeting Location</th>
                    <th>date_time</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class ="text">
                        <td>{{ optional($appointment->user)->name }}</td>
                        <td>{{ optional($appointment->user)->contact_number }}</td>
                        <td>{{ optional($appointment->property)->property_name }}</td>
                        <td>{{ $appointment->meeting_location }}</td>
                        <td>{{ $appointment->date_time }}</td>
                        <!-- Add more table data as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color:white;
        }

        table.table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        .text {
        color: white;
    }
    </style>

@endsection
