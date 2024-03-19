<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
	Route::controller(AuthController::class)->group(function () {
	    Route::get('register', 		'showRegisterForm')->name('web.showRegisterForm');
	    Route::post('register', 	'register'		  )->name('web.registger'  	    );
	    Route::post('check_email', 	'checkEmail'	  )->name('web.checkEmail'  	);
	    Route::get('login', 		'showLoginForm'	  )->name('web.showLoginForm'	);
	    Route::post('login', 		'login'			  )->name('web.login'  	   		);
	});
}); 

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
	/*
	|--------------------------------------------------------------------------
	| Home Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/', 'HomeController@index')->name('home');

	/*
	|--------------------------------------------------------------------------
	| Product Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(ProductController::class)->prefix('products')->group(function () {
		Route::get('list',		'index')->name('product.index');
		Route::post('list',		'index')->name('product.filter');
		Route::get('show/{id}',	'show' )->name('product.show');
	});

	/*
	|--------------------------------------------------------------------------
	| NewsLetter Routes
	|--------------------------------------------------------------------------
	*/
	Route::post('news-letter/store', 'NewsletterController@store');
});
