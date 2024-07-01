<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\StockController::class, 'index'])->name('index');

    #stock
    Route::group(['prefix' => 'stock', 'as' => 'stock.'], function(){
       Route::post('/store', [StockController::class, 'store'])->name('store');
       Route::get('/{id}/edit', [StockController::class, 'edit'])->name('edit');
       Route::get('/show', [StockController::class, 'show'])->name('show');
       Route::patch('/{id}/update', [StockController::class, 'update'])->name('update');
       Route::delete('/{id}/destroy', [StockController::class, 'destroy'])->name('destroy');    
       Route::get('/{id}/buy', [StockController::class, 'buy'])->name('buy');
       Route::patch('/{id}/purchase', [StockController::class, 'purchase'])->name('purchase');
       Route::get('/payment', [StockController::class, 'payment'])->name('payment');

    });


});



