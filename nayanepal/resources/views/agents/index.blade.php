<head>


<style>
    /* Container for the property agents section */
    .property-agents {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    /* Individual property agent card */
    .property-agent-card {
        width: calc(25% - 20px); /* Adjust the width as needed */
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Property agent image */
    .property-agent-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 15px;
        background-color: #f2f2f2; /* Placeholder background color */
    }

    /* Property agent full name */
    .property-agent-name {
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Property agent designation */
    .property-agent-designation {
        color: #777;
    }
</style>

</head>
<div class="agent-table-container">
    <table class="agent-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Profile Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
            <tr>
                <td>{{ $agent->id }}</td>
                <td>{{ $agent->first_name }}</td>
                <td>{{ $agent->last_name }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ $agent->phone_number }}</td>
                <td><img src="{{ asset('images/' . $agent->profile_image) }}" alt="{{ $agent->profile_image }}" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>









