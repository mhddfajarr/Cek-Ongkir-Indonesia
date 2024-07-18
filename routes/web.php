<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\PerulanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-ongkir', [OngkirController::class, 'index']);
Route::post('/cek-ongkir', [OngkirController::class, 'cekOngkir']);

Route::get('/perulangan', [PerulanganController::class, 'index']);
Route::post('/perulangan', [PerulanganController::class, 'process']);