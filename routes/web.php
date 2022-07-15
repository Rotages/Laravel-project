<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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
//All
Route::get('/', [ListingController::class, 'index']);

//New Post
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//Edit
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//Update the edit
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//Single
Route::get('/listings/{listing}', [ListingController::class,'show']);

//Register/Create
Route::get('/register', [UserController::class,'create'])->middleware('guest');

//Create New User
Route::post('/users',[UserController::class,'store']);

//Logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate',[UserController::class,'authenticate']);
