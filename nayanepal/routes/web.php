<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
//Route::get('/user/dashboard', 'UserController@dashboard')->name('user.dashboard');
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('home');

Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('/properties/{property_id}/reviews', [ReviewController::class, 'index'])
    ->name('properties.reviews.index');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    
Route::get('/properties/single_property/{id}', [propertyController::class,'single_property']);

Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');

//Route::get('/properties', [propertyController::class,'index']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');

Route::get('/reviews', [ReviewController::class, 'allReviews'])->name('reviews.allReviews');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/create', [PropertyController::class,'create']);
    Route::post('/create', [PropertyController::class,'store']);


    Route::get('/delete_property/{id}', [PropertyController::class,'delete_property']);

   // Route for displaying the edit property form
   Route::get('/properties/edit/{id}', [PropertyController::class, 'edit_property_form'])->name('properties.edit.form');


// Route for handling property updates
Route::put('/properties/update/{id}', [PropertyController::class, 'edit_property'])->name('properties.update');


    Route::get('/appointments/create/{property_id}/{user_id}', [AppointmentController::class, 'create'])->name('appointments.create');
     Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::get('/reviews/create/{property_id}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/agents/create/{user_id}', [AgentController::class, 'create'])->name('agents.create');
     // Store Agent (Handle Form Submission)
     Route::post('/agents/store', [AgentController::class, 'store'])->name('agents.store');
     
       // Define the route for handling the review submission 

       Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');

// Store a new location
        Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');


     
          Route::get('/categorys/create', [CategoryController::class, 'create'])->name('categorys.create');

        // Store a new location
                Route::post('/categorys', [CategoryController::class, 'store'])->name('categorys.store');

                Route::get('/statuses/create', [StatusController::class, 'create'])->name('statuses.create');

                // Store a new location
                        Route::post('/statuses', [StatusController::class, 'store'])->name('statuses.store');
             
});

require __DIR__.'/auth.php';
