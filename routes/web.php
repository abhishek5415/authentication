<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'viewRegister']);
Route::post('/register',[UserController::class,'register']);

Route::get('/login',[UserController::class,'viewLogin']);
Route::post('/login',[UserController::class,'login']);

Route::get('/home/logout',[UserController::class,'logout']);

//Post Control
Route::get('/home/{page}',[PostController::class,'View']);
Route::post('/home/{page}',[PostController::class,'View']);

Route::get('/home/{page}/add',[PostController::class,'addView']);
Route::post('/home/{page}/add',[PostController::class,'add']);

Route::get('/home/{id}/edit',[PostController::class,'editView']);
Route::put('/home/{id}/edit',[PostController::class,'edit']);

Route::get('/home/{id}/delete',[PostController::class,'destroy']);