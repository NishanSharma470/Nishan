<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>navbar</title>
</head>
<style>
    /* UTILITIES */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: cursive;
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #D733FF;
  color: #fff;
}

.nav-links a {
  color: #fff;
}

/* LOGO */
.logo {
  font-size: 32px;
}

/* NAVBAR MENU */
.menu {
  display: flex;
  gap: 1em;
  font-size: 18px;
}

.menu li:hover {
  background-color: #ff33c1;
  border-radius: 5px;
  transition: 0.3s ease;
}

.menu li {
  padding: 5px 14px;
}

/* DROPDOWN MENU */
.services {
  position: relative; 
}

.dropdown {
  background-color: rgb(1, 139, 139);
  padding: 1em 0;
  position: absolute; /*WITH RESPECT TO PARENT*/
  display: none;
  border-radius: 8px;
  top: 35px;
}

.dropdown li + li {
  margin-top: 10px;
}

.dropdown li {
  padding: 0.5em 1em;
  width: 8em;
  text-align: center;
}

.dropdown li:hover {
  background-color: #ff33c1;
}

.services:hover .dropdown {
  display: block;
}

.btn-login {
    background-color: #007bff;
    color: #fff;
    transition: background-color 0.3s ease;
    transition: background-color 0.3s ease;
    padding: 15px 30px; /* Increase padding to make it larger */
    font-size: 18px; /* Increase font size to make it larger */
    border-radius: 10px;
}

.btn-login:hover {
    background-color: #0056b3;
}

/* Style for the "Register" button */
.btn-register {
    background-color: #28a745;
    color: #fff;
    transition: background-color 0.3s ease;
    background-color: #28a745;
    color: #fff;
    transition: background-color 0.3s ease;
    padding: 15px 30px; /* Increase padding to make it larger */
    font-size: 18px; /* Increase font size to make it larger */
    border-radius: 10px; 
}

.btn-register:hover {
    background-color: #1e7e34;
}

/* Style for the "Dashboard" button */
.btn-dashboard {
    background-color: #6c757d;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-dashboard:hover {
    background-color: #545b62;
}

/* Additional focus styles if needed */
.btn:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
}

    </style>

</style>
<body>
  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo">NayaNepalNirman</div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      

      <!-- NAVIGATION MENUS -->

          <!-- DROPDOWN MENU -->
         
        </li>

        @if (Route::has('login'))
            <li>
                @auth
                    
                @else
                    <a href="{{ route('login') }}" class="btn-login">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-register">Register</a>
                    @endif
                @endauth
            </li>
        @endif

        @if (Auth::check())
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
@else
    <!-- Display something else for non-authenticated users -->
@endif


        
    </ul>
  </nav>
</body>

</html>