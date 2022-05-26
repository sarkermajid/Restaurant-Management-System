<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);

// for user route
Route::get('/users', [AdminController::class, 'users']);
Route::get('/user_delete/{id}', [AdminController::class, 'user_delete']);

// for food items route
Route::get('/food', [AdminController::class, 'food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);
Route::get('/food_delete/{id}', [AdminController::class, 'food_delete']);
Route::get('/food_edit/{id}', [AdminController::class, 'food_edit']);
Route::post('/food_update/{id}', [AdminController::class, 'food_update']);

// for reservation route
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/view_reservation', [AdminController::class, 'view_reservation']);
Route::get('/delete_reservation/{id}', [AdminController::class, 'delete_reservation']);

// for chefs route
Route::get('/chefs', [AdminController::class, 'chefs']);
Route::post('/add_chefs', [AdminController::class, 'add_chefs']);
Route::get('/chef_edit/{id}', [AdminController::class, 'chef_edit']);
Route::post('/chef_update/{id}', [AdminController::class, 'chef_update']);
Route::get('/chef_delete/{id}', [AdminController::class, 'chef_delete']);

// for cart route
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/view_cart/{id}', [HomeController::class, 'view_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

// for order route
Route::post('/order_confirm', [HomeController::class, 'order_confirm']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
