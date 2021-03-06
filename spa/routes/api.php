<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
/*
|---    -----------------------------------------------------------------------
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

Route::get('/data', [DataController::class, 'index']);
Route::post('/customers', [DataController::class, 'store']);
Route::get('/customers/{id}', [DataController::class, 'show']);
Route::POST('/customers/{id}', [DataController::class, 'update']);
Route::get('/delete/customers/{id}', [DataController::class, 'destroy']);
Route::get('/user/{id}', [DataController::class, 'showUser']);

Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('login');

Route::any('/check-login', function(){
    return true;
})->middleware('auth:sanctum');