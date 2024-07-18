<?php

use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-ongkir', [OngkirController::class, 'index']);
Route::post('/cek-ongkir', [OngkirController::class, 'cekOngkir']);