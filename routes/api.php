<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Security Guard API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'guard', 'namespace'=>'App\Http\Controllers\API\Guard'], function(){
	/*
	|--------------------------------------------------------------------------
	| Public Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(AuthController::class)->prefix('auth')->group(function () {
    	Route::post('register',			'register'	);
    	Route::post('login',			'login'		);
    	Route::post('forgot_password',  'forgotPass');
        Route::post('verify_otp',       'verifiOtp' );
        Route::post('reset_password',   'resetPass' );
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
| Security Firm API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/