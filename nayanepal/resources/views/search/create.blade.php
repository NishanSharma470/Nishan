
<style>
    /* Apply styles to the form container */
.property-search-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

/* Style form labels */
.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Style form inputs and select boxes */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

/* Style the submit button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>




<form action="{{ route('properties.search') }}" method="GET" class="property-search-form">
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->type }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="location_id">Location:</label>
        <select name="location_id" id="location_id" class="form-control" required>
            <option value="">Select Location</option>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->city }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Search</button>
</form>


