<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Account Route
|--------------------------------------------------------------------------
*/
Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
	Route::get('view',			    'show'          )->name('show'         );
    Route::post('update',		    'update'        )->name('update'       );
    Route::post('logout',		    'logout'        )->name('logout'       );
    Route::post('check_password',	'checkPassword' )->name('checkPassword');
});

/*
|--------------------------------------------------------------------------
| Customer Address Route
|--------------------------------------------------------------------------
*/
Route::controller(AddressController::class)->prefix('address')->as('address.')->group(function () {
	Route::get('list',			'index'  )->name('index' );
	Route::get('create',		'create' )->name('create');
    Route::post('store',		'store'  )->name('store' );
    Route::get('edit/{id}',		'edit'   )->name('edit'  );
    Route::post('update',		'update' )->name('update');
    Route::post('delete',       'destroy')->name('delete');
});

/*
|--------------------------------------------------------------------------
| Customer Favourite Product Route
|--------------------------------------------------------------------------
*/
Route::controller(FavouriteProductController::class)->prefix('favourite')->as('favourite.')->group(function () {
	Route::get('list',			    'index'        )->name('index' );
    Route::post('store',		    'store'        )->name('store' );
    Route::post('delete',		    'destroy'      )->name('delete');
});
