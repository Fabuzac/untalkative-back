<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MessageController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::post('/pictures', [PictureController::class, 'search']);
Route::get('/pictures/{id}', [PictureController::class, 'show'])->middleware('frontend');
Route::post('/pictures/store', [PictureController::class, 'store'])->middleware('frontend');
Route::get('/pictures/{id}/checkLike', [PictureController::class, 'checklike'])->middleware('frontend');
Route::get('/pictures/{id}/handleLike', [PictureController::class, 'handleLike'])->middleware('frontend');
Route::delete('/pictures/{id}/delete', [PictureController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'userLogged'])->middleware('frontend');

Route::post('/chat', [MessageController::class, 'store']);
Route::get('/chat/{id}', [MessageController::class, 'show']);