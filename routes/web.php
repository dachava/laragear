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

//Las rutas se toman del ListingController
//Aqui se llaman los metodos de ese controller

//Show create form
//Usa el middleware auth para requerir el login si no esta autenticado
//Se debe nombrar la ruta a login, como mas abajo se hace
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//ALL LISTINGS
Route::get('/', [ListingController::class, 'index']);


//Store listing data in create
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update edited data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//Show register
//Middleware guest para no permitir acceder al register form una vez logueado
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);


//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
//La ruta tiene nombre login para que el middleware auth la reconozca
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);