<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

Route::apiResource('users', UserController::class);

Route::resource('member', MemberController::class);

Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('MyPosts', PostController::class)->middleware('auth:sanctum');


