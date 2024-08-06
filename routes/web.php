<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;



Route::get('/', [CountryController::class, 'index']);
Route::get('/search', [CountryController::class, 'search']);
