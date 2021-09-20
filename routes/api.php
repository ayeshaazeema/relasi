<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::post('user/create', [UserController::class, 'createUser']);
Route::get('user/get/{$id}', [UserController::class, 'getUser']);
Route::post('user/update/{$id}', [UserController::class, 'updateUser']);
Route::delete('user/delete/{$id}', [UserController::class, 'deleteUser']);

Route::post('phone/create', [PhoneController::class, 'createPhone']);
Route::get('phone/get/{$id}', [PhoneController::class, 'getPhone']);

Route::post('post/create', [PostController::class, 'createPost']);
Route::get('post/get/{post}', [PostController::class, 'getPost']);
Route::post('post/update/{post}', [PostController::class, 'updatePost']);
Route::delete('post/delete/{post}', [PostController::class, 'deletePost']);

Route::post('comment/{post}/create', [CommentController::class, 'createComment']);
Route::post('comment/{post}/update/{comment}', [CommentController::class, 'updateComment']);
Route::delete('comment/{post}/delete/{comment}', [CommentController::class, 'deleteComment']);
