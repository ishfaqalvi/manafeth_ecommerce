<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Account Route
|--------------------------------------------------------------------------
*/
Route::controller(EmployeeController::class)->as('employees.')->group(function () {
	Route::get('list',					'index'		 )->name('index'	 );
	Route::get('create',				'create'	 )->name('create'	 );
	Route::post('store',				'store'		 )->name('store'	 );
	Route::get('edit/{id}',				'edit'		 )->name('edit'		 );
	Route::get('show/{id}',				'show'		 )->name('show'		 );
	Route::patch('update/{employee}',	'update'	 )->name('update'	 );
	Route::delete('delete/{id}',		'destroy'	 )->name('destroy'	 );
    Route::post('check_email',	        'checkEmail' )->name('checkEmail');
});
