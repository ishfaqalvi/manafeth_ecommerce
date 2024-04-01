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
