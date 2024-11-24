<?php

use App\Http\Controllers\DetailMateriController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// MataKuliah
Route::get('/mataKuliah', [MataKuliahController::class, 'index']);
Route::post('/mataKuliahAdd', [MataKuliahController::class, 'store']);
Route::patch('/mataKuiahUpdate/{id}', [MataKuliahController::class, 'update']);
Route::delete('/mataKuliahDelete/{id}', [MataKuliahController::class, 'destroy']);

// Materi
Route::get('/materi', [DetailMateriController::class, 'index']);
Route::post('/materiAdd', [DetailMateriController::class, 'store']);
Route::patch('/materiUpdate/{id}', [DetailMateriController::class, 'update']);
Route::delete('/materiDelete/{id}', [DetailMateriController::class, 'destroy']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
