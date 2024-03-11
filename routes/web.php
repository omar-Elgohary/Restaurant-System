<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CategoryController;

Route::get('/', [VisitorController::class, 'index'])->name('visitorPage');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);

Route::resource('meal', MealController::class);
