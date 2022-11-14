<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    # Get All Resource
    Route::get('/patients', [PatientController::class, 'index']);

    # Add Resource
    Route::post('/patients', [PatientController::class, 'store']);

    # Get Detail Resource
    Route::get('/patients/{id}', [patientController::class, 'show']);

    # Edit Resource
    Route::put('/patients/{id}', [patientController::class, 'update']);

    # Delete Resource
    Route::delete('/patients/{id}', [patientController::class, 'destroy']);

    # Search Resource by Name
    Route::get('/patients/search/{name}', [patientController::class, 'search']);

    # Get Positive Resource
    Route::get('/patients/status/positive', [patientController::class, 'positive']);

    # Get Recovered Resource
    Route::get('/patients/status/recovered', [patientController::class, 'recovered']);

    # Get Dead Resource
    Route::get('/patients/status/dead', [patientController::class, 'dead']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);