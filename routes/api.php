<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::post('save_data', [ContactController::class, 'save_data'])->name('api.save_data');
Route::post('fetch_data', [ContactController::class, 'fetch_data'])->name('api.fetch_data');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
