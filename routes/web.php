<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth:web')->group(function() {


    Route::resource('home', HomeController::class);
    Route::resource('profile', ProfileController::class);
    Route::post('edit_profile', [HomeController::class, 'edit_profile'])->name('edit_profile');
    Route::get('follow/{id}', [HomeController::class, 'follow'])->name('follow');
   
});
