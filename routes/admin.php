<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Create\CreateUsers;
use App\Http\Livewire\Admin\Create\CreateForms;
use App\Http\Livewire\Admin\Show\ShowCategory;
use App\Http\Livewire\Admin\Show\ShowOrigin;
use App\Http\Livewire\Admin\Show\ShowProduct;
use App\Http\Livewire\Admin\Edit\EditProduct;
use App\Http\Livewire\Admin\Show\ShowProvider;
use App\Http\Livewire\Admin\Show\ShowStock;
use App\Http\Livewire\Admin\Show\ShowSubcategory;
use App\Http\Livewire\Admin\Show\ShowTrademark;
use App\Http\Livewire\Admin\Show\ShowWarehouse;
use App\Http\Livewire\Admin\Show\ShowUsers;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','restriction.users'])->group(function(){
    // Grupo de rutas para la administración del ecommerce
	Route::prefix('admin')->group(function(){
        Route::name('admin.')->group(function(){
            // Ruta del tablero de administración
        	Route::get('/dashboard', Dashboard::class)
        		->name('dashboard');
            // Grupo de rutas para administrar los usuarios
            Route::prefix('users')->group(function(){
                Route::name('users.')->group(function(){
                    Route::get('/create', CreateUsers::class)
                        ->name('create');
                    Route::get('/show', ShowUsers::class)
                        ->name('show');
                });
            });
            // Grupo de rutas para administrar el ecommerce
            Route::prefix('ecommerce')->group(function(){
                Route::name('ecommerce.')->group(function(){
                    Route::get('/create', CreateForms::class)
                        ->name('create');
                    Route::get('/categories/show', ShowCategory::class)
                        ->name('categories.show');
                    Route::get('/origins/show', ShowOrigin::class)
                        ->name('origins.show');
                    Route::get('/products/show', ShowProduct::class)
                        ->name('products.show');
                    Route::get('/products/{product_id}/edit', EditProduct::class)
                        ->name('products.edit');
                    Route::get('/providers/show', ShowProvider::class)
                        ->name('providers.show');
                    Route::get('/stocks/show', ShowStock::class)
                        ->name('stocks.show');
                    Route::get('/subcategories/show', ShowSubcategory::class)
                        ->name('subcategories.show');
                    Route::get('/trademarks/show', ShowTrademark::class)
                        ->name('trademarks.show');
                    Route::get('/warehouses/show', ShowWarehouse::class)
                        ->name('warehouses.show');
                });
            });
            // Grupo de rutas para administrar los usuarios
            /*Route::prefix('tutorials')->group(function(){
                Route::name('tutorials.')->group(function(){
                    Route::get('/create', CreateUsers::class)
                        ->name('create');
                    Route::get('/show', ShowUsers::class)
                        ->name('show');
                });
            });*/
    	});
    });
});
?>