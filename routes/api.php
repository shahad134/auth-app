<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ListOfDonation;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register']); 
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        //donation =route
        Route::post('donations',[ListOfDonation::class,'apistore']);
        Route::get('/receive_donation',[ListOfDonation::class,'receive_donation']);

        
        Route::get('/logout', [AuthController::class,'logout']);
        // Route::get('/user', 'Auth\AuthController@user');
        Route::get('/user', [AuthController::class, 'user']);
    });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
