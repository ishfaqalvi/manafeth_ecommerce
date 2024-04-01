<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
    Route::controller(AuthController::class)->as('web.')->group(function () {
        Route::get('register',          'showRegisterForm'  )->name('showRegisterForm');
        Route::post('register',         'register'          )->name('registger'       );
        Route::post('verify-account',   'verifyAccount'     )->name('verifyAccount'   );
        Route::get('login',             'showLoginForm'     )->name('showLoginForm'   );
        Route::post('login',            'login'             )->name('login'           );
        Route::get('forgot-password',   'showForgotPassForm')->name('forgotPassword'  );
        Route::post('forgot-password',  'forgotPassword'    )->name('forgotPassword'  );
        Route::get('reset-password',    'showResetPassword' )->name('resetPassword'   );
        Route::post('reset-password',   'resetPassword'     )->name('resetPassword'   );
        Route::post('check-email',      'checkEmail'        )->name('checkEmail'      );
        Route::post('verify-email',     'verifyEmail'       )->name('verifyEmail'     );
        Route::post('verify-otp',       'verifyOTP'         )->name('verifyOTP'       );
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
	| NewsLetter Routes
	|--------------------------------------------------------------------------
	*/
    Route::post('news-letter/store', 'NewsletterController@store');

    /*
	|--------------------------------------------------------------------------
	| Brand Routes
	|--------------------------------------------------------------------------
	*/
    Route::get('brands', 'BrandController@index')->name('brand.index');

    /*
	|--------------------------------------------------------------------------
	| Blog Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(BlogController::class)->prefix('blogs')->as('web.blogs.')->group(function () {
        Route::get('list',          'index'  )->name('index');
        Route::get('show/{id}',     'show'  )->name('show');
    });
});
