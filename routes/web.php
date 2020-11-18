<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\Auth\LoginController;


Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'logout' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

Route::group(['middleware' => ['auth', 'is_admin']], function() {
		Route::get('/panel', [PanelController::class, 'index'])->name('panel');

});
Route::group(['middleware' => ['auth']], function() {
	Route::get('/', [MainController::class, 'index'])->name('index');

	Route::post('/template/add/{id}', [OrderController::class, 'templateSelect'])->name('template_add');

	Route::get('/symbol', [OrderController::class, 'symbol'])->name('symbol');
	Route::post('/symbol/add/{id}', [OrderController::class, 'symbolSelect'])->name('symbol_add');

	Route::get('/order', [OrderController::class, 'order'])->name('order');
	Route::post('/order/add', [OrderController::class, 'orderAdd'])->name('order_form');
	// Route::post('/order/create', [OrderController::class, 'submit'])->name('order_form');

	Route::group(['middleware' => 'order_not_empty'], function() {
		Route::get('/preview', [PreviewController::class, 'preview'])->name('preview');
		Route::get('/preview/file', [PreviewController::class, 'previewPDF'])->name('preview_pdf');
	});
});





// Route::get('/invoice', [MainController::class, 'invoice2'])->name('invoice');
