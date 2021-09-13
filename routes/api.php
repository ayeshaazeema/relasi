<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('user/get/{$id}', [UserController::class, 'getUser']);
Route::post('user/create', [UserController::class, 'createUser']);
Route::post('user/update/{$id}', [UserController::class, 'updateUser']);
Route::delete('user/delete/{$id}', [UserController::class, 'deleteUser']);

Route::get('phone/get/{$id}', [PhoneController::class, 'getPhone']);
Route::post('phone/create', [PhoneController::class, 'createPhone']);
