<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories',[CategoryController::class,'index']);
Route::post('categories',[CategoryController::class,'store']);
Route::put('categories/{category}',[CategoryController::class,'update']);
Route::get('categories/{category}',[CategoryController::class,'show']);
Route::delete('categories/{category}',[CategoryController::class,'destroy']);

Route::get('posts',[PostController::class,'indexs']);
Route::post('posts',[PostController::class,'stores']);
Route::put('posts/{post}',[PostController::class,'updates']);
Route::get('posts/{post}',[PostController::class,'shows']);
Route::delete('posts/{post}',[PostController::class,'destroys']);
