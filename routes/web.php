<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


// Auth::routes([
// 	'reset' => false,
// 	'register' => false,
// 	'reset' => false,
// ]);

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/welcome', [MainController::class, 'welcome'])->name('welcome');
Route::get('/{template}', [MainController::class, 'template']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
