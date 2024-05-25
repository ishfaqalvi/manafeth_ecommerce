<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Sale Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(SaleController::class)->prefix('sale')->as('products.sale.')->group(function () {
	Route::get('list',				 'index'	 )->name('index'  	 );
	Route::post('list',				 'index'	 )->name('filter'  	 );
	Route::get('create',			 'create'	 )->name('create' 	 );
	Route::post('store',			 'store'	 )->name('store'  	 );
	Route::get('edit/{id}',			 'edit'		 )->name('edit'	  	 );
	Route::get('show/{id}',			 'show'		 )->name('show'	  	 );
	Route::patch('update/{id}', 	 'update'	 )->name('update' 	 );
	Route::delete('delete/{id}',	 'destroy'	 )->name('destroy'	 );
	Route::post('add-to-cart',		 'addToCart' )->name('addToCart' );
});

/*
|--------------------------------------------------------------------------
| Rent Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(RentController::class)->prefix('rent')->as('products.rent.')->group(function () {
	Route::get('list',				 'index'	 )->name('index'  	 );
	Route::post('list',				 'index'	 )->name('filter'  	 );
	Route::get('create',			 'create'	 )->name('create' 	 );
	Route::post('store',			 'store'	 )->name('store'  	 );
	Route::get('edit/{id}',			 'edit'		 )->name('edit'	  	 );
	Route::get('show/{id}',			 'show'		 )->name('show'	  	 );
	Route::patch('update/{id}', 	 'update'	 )->name('update' 	 );
	Route::delete('delete/{id}',	 'destroy'	 )->name('destroy'	 );
    Route::post('add-to-cart',		 'addToCart' )->name('addToCart' );
});

/*
|--------------------------------------------------------------------------
| Rent Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(MaintenanceController::class)->prefix('maintenance')->as('products.maintenance.')->group(function () {
	Route::get('list',				 'index'	 )->name('index'  	 );
	Route::post('list',				 'index'	 )->name('filter'  	 );
	Route::get('create',			 'create'	 )->name('create' 	 );
	Route::post('store',			 'store'	 )->name('store'  	 );
	Route::get('edit/{id}',			 'edit'		 )->name('edit'	  	 );
	Route::get('show/{id}',			 'show'		 )->name('show'	  	 );
	Route::patch('update/{product}', 'update'	 )->name('update' 	 );
	Route::delete('delete/{id}',	 'destroy'	 )->name('destroy'	 );
});

/*
|--------------------------------------------------------------------------
| Product Features Routes
|--------------------------------------------------------------------------
*/
Route::controller(FeatureController::class)->prefix('feature')->as('products.feature.')->group(function () {
	Route::post('store',			'store'	 	)->name('store'  	 );
	Route::post('update', 			'update'	)->name('update' 	 );
	Route::delete('delete/{id}',	'destroy'	)->name('destroy'	 );
});

/*
|--------------------------------------------------------------------------
| Product Specifications Routes
|--------------------------------------------------------------------------
*/
Route::controller(SpecificationController::class)->prefix('specification')->as('products.specification.')->group(function () {
	Route::post('store',			'store'	 	)->name('store'  	 );
	Route::post('update', 			'update'	)->name('update' 	 );
	Route::delete('delete/{id}',	'destroy'	)->name('destroy'	 );
});

/*
|--------------------------------------------------------------------------
| Product Resources Routes
|--------------------------------------------------------------------------
*/
Route::controller(ResourceController::class)->prefix('resource')->as('products.resource.')->group(function () {
	Route::post('store',			'store'	 	)->name('store'  	 );
	Route::post('update', 			'update'	)->name('update' 	 );
	Route::delete('delete/{id}',	'destroy'	)->name('destroy'	 );
});

/*
|--------------------------------------------------------------------------
| Product Images Routes
|--------------------------------------------------------------------------
*/
Route::controller(ImageController::class)->prefix('images')->as('products.images.')->group(function () {
	Route::post('store',			'store'	 	)->name('store'  	 );
	Route::delete('delete/{id}',	'destroy'	)->name('destroy'	 );
});
