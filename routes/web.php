<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/listings/create', [ListingController::class, 'create']);

//ALL LISTINGS
Route::get('/', [ListingController::class, 'index']);


//Store listing data in create
Route::post('/listings', [ListingController::class, 'store']);

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update edited data
Route::put('/listings/{listing}', [ListingController::class, 'update']);


//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);