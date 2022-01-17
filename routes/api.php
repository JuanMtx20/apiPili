<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/products', App\Http\Controllers\Api\V1\ProductController::class)
    ->only(['index', 'show'])
    ->middleware('cors');

Route::apiResource('v1/products', App\Http\Controllers\Api\V1\ProductController::class)
    ->only(['destroy'])
    ->middleware('auth:sanctum');


Route::post('login', [
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);