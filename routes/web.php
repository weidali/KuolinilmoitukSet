<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


// Route::get('/', 'MainController@index');
Route::get('/', [MainController::class, 'index']);
Route::get('/{template}', [MainController::class, 'template']);