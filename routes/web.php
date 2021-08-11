<?php

use App\Http\Livewire\Shop\Welcome;
use App\Http\Livewire\Shop\ShowCategory as CategoryProducts;
use App\Http\Livewire\Shop\ShowProduct as ShopProduct;
use App\Http\Livewire\Shop\ShoppingKart;
use App\Http\Livewire\Shop\ShowTutorials;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::prefix('category')->group(function(){
    Route::name('category.')->group(function (){
        Route::get('/{category}/show',CategoryProducts::class)
            ->name('show');
    });
});
Route::prefix('product')->group(function(){
    Route::name('product.')->group(function(){
        Route::get('/{product}/showproduct',ShopProduct::class)
            ->name('showproduct');
    });
});
Route::prefix('preferences')->group(function(){
    Route::name('preferences.')->group(function(){
        Route::get('ShoppingCart',ShoppingKart::class)
            ->name('ShoppingCart');
    });
});
Route::prefix('tutorials')->group(function(){
    Route::name('tutorials.')->group(function(){
        Route::get('/',ShowTutorials::class)
            ->name('show');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';