<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;


Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('get_logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/panel', [PanelController::class, 'index'])->name('panel');
});

Route::post('/order/create', [OrderController::class, 'submit'])->name('order-form');
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/welcome', [MainController::class, 'welcome'])->name('welcome');
Route::get('/{template}', [MainController::class, 'template']);
