<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BukuController::class, 'index']);
Route::post('/store', [BukuController::class, 'store']);
Route::get('/edit/{id}', [BukuController::class, 'edit']);
Route::post('/update/{id}', [BukuController::class, 'update']);
Route::get('/delete/{id}', [BukuController::class, 'destroy']);
