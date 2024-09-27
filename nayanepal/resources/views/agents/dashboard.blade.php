<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('AdminDashboard') }}
            <style>
    /* Add this CSS to your existing styles or create a new CSS file */

/* Style for the button container */
.button-container {
    display: flex;
    gap: 10px; /* Add some space between buttons */
}

/* Style for the buttons */
.btn {
    display: inline-block;
    padding: 10px 20px;
    border: 1px solid #333; /* Add a subtle border */
    color: white; /* Button text color */
    text-decoration: none;
    border-radius: 5px; /* Button border radius */
    transition: background-color 0.3s ease;
}

/* Hover effect for buttons */
.btn:hover {
    background-color: transparent; /* Remove background color on hover */
    color: #007bff; /* Change text color on hover */
}

</style>
            
            @if (Auth::check())
    {{-- Check if the user is authenticated --}}
    
    @if (auth()->user()->role->name === 'agent')
        {{-- Check if the user's role is 'agent' --}}
        
        <a href="{{ url('/create') }}" class = "button-container btn btn:hover">Add property</a>
        <a href="{{url('/appointments')}}"class = "button-container btn btn:hover" >view appiomtment</a>
        <a href="{{ route('locations.create') }}" class = "button-container btn btn:hover">Add Location</a>
        <a href="{{ route('categorys.create') }}" class = "button-container btn btn:hover">Add categorys</a>
        <a href="{{ route('statuses.create') }}" class = "button-container btn btn:hover">Add status</a>
        <a href="{{ url('/reviews') }}" class = "button-container btn btn:hover">All review</a>
        {{-- Display the "Add property" link for agents --}}
        
    @endif
@endif

            
            <a href="{{url('/properties')}}" class = "button-container btn btn:hover">view peoperty</a>

        


            

        </h2>
    </x-slot>

   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
