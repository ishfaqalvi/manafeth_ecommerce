<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'customer', 'namespace'=>'App\Http\Controllers\API\Customer'], function(){
	/*
	|--------------------------------------------------------------------------
	| Public Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(AuthController::class)->prefix('auth')->group(function () {
    	Route::post('register',			'register'		);
    	Route::post('login',			'login'			);
    	Route::post('account_varify',   'accountVarify'	);
    	Route::post('forgot_password',  'forgotPass'	);
        Route::post('verify_otp',       'verifiOtp' 	);
        Route::post('reset_password',   'resetPass' 	);
	});

	/*
	|--------------------------------------------------------------------------
	| Protected Routes
	|--------------------------------------------------------------------------
	*/
	Route::middleware('auth:sanctum')->group(function () {
	    /*
	    |--------------------------------------------------------------------------
	    | Auth Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(AuthController::class)->prefix('auth')->group(function () {
	        Route::get('view',              'view'   );
	        Route::post('update',           'update' );
	        Route::get('logout',            'logout' );
	        Route::delete('delete/{id}',    'destroy');
	    });
	});
});

/*
|--------------------------------------------------------------------------
| Other All API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace'=>'App\Http\Controllers\API'], function(){
	/*
	|--------------------------------------------------------------------------
	| Category Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    	Route::get('main',		'main');
    	Route::get('sub',		'sub' );
	});

	/*
	|--------------------------------------------------------------------------
	| Brands Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(BrandController::class)->prefix('brands')->group(function () {
    	Route::get('list',		'index');
	});

	/*
	|--------------------------------------------------------------------------
	| Products Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(ProductController::class)->prefix('products')->group(function () {
    	Route::get('list',			'index');
    	Route::get('view/{id}',		'show' );
	});

	/*
	|--------------------------------------------------------------------------
	| Protected Routes
	|--------------------------------------------------------------------------
	*/
	Route::middleware('auth:sanctum')->group(function () {
	    /*
	    |--------------------------------------------------------------------------
	    | Auth Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(AuthController::class)->prefix('auth')->group(function () {
	        Route::get('view',              'view'   );
	        Route::post('update',           'update' );
	        Route::get('logout',            'logout' );
	        Route::delete('delete/{id}',    'destroy');
	    });
	});
});