<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Ruta para obtener los parámetros
Route::get('/parameters', [ApiController::class, 'getParameters']);

// Ruta para obtener los hoteles
// El parámetro {id_hotel?} es opcional y puede ser utilizado para obtener un hotel específico
Route::get('/hotels/{id_hotel?}', [HotelController::class, 'index']);

// Ruta para crear un nuevo hotel
Route::post('/hotels', [HotelController::class, 'store']);
