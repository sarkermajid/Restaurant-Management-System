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
Route::get('/users', [AdminController::class, 'users']);
Route::get('/user_delete/{id}', [AdminController::class, 'user_delete']);
Route::get('/food', [AdminController::class, 'food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);
Route::get('/food_delete/{id}', [AdminController::class, 'food_delete']);
Route::get('/food_edit/{id}', [AdminController::class, 'food_edit']);
Route::post('/food_update/{id}', [AdminController::class, 'food_update']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
