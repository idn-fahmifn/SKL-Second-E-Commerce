<?php

use Illuminate\Support\Facades\Route;
// Import Controller
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('penjual', UserController::class); 
Route::resource('biodata', ProfileController::class); 
Route::resource('toko', TokoController::class); 