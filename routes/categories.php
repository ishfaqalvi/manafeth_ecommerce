<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Category Route
|--------------------------------------------------------------------------
*/
Route::controller(MainSaleController::class)->prefix('main/sale')->as('main.sale.')->group(function () {
	Route::get('list',					'index'			)->name('index'		);
	Route::post('list',					'index'			)->name('filter'	);
	Route::get('create',				'create'		)->name('create'	);
	Route::post('store',				'store'			)->name('store'		);
	Route::get('edit/{id}',				'edit'			)->name('edit'		);
	Route::get('show/{id}',				'show'			)->name('show'		);
	Route::patch('update/{category}',	'update'		)->name('update'	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	);
});

Route::controller(MainRentController::class)->prefix('main/rent')->as('main.rent.')->group(function () {
	Route::get('list',					'index'			)->name('index'		);
	Route::post('list',					'index'			)->name('filter'	);
	Route::get('create',				'create'		)->name('create'	);
	Route::post('store',				'store'			)->name('store'		);
	Route::get('edit/{id}',				'edit'			)->name('edit'		);
	Route::get('show/{id}',				'show'			)->name('show'		);
	Route::patch('update/{category}',	'update'		)->name('update'	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	);
});

/*
|--------------------------------------------------------------------------
| Sub Category Route
|--------------------------------------------------------------------------
*/
Route::controller(SubSaleController::class)->prefix('sub/sale')->as('sub.sale.')->group(function () {
	Route::get('list',					'index'			)->name('index'		);
	Route::post('list',					'index'			)->name('filter'	);
	Route::get('create',				'create'		)->name('create'	);
	Route::post('store',				'store'			)->name('store'		);
	Route::get('edit/{id}',				'edit'			)->name('edit'		);
	Route::get('show/{id}',				'show'			)->name('show'		);
	Route::patch('update/{category}',	'update'		)->name('update'	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	);
});

Route::controller(SubRentController::class)->prefix('sub/rent')->as('sub.rent.')->group(function () {
	Route::get('list',					'index'			)->name('index'		);
	Route::post('list',					'index'			)->name('filter'	);
	Route::get('create',				'create'		)->name('create'	);
	Route::post('store',				'store'			)->name('store'		);
	Route::get('edit/{id}',				'edit'			)->name('edit'		);
	Route::get('show/{id}',				'show'			)->name('show'		);
	Route::patch('update/{category}',	'update'		)->name('update'	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	);
});
