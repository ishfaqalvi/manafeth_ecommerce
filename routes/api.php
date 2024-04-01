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
	Route::middleware('auth:sanctum,customerapi')->group(function () {
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

	    /*
	    |--------------------------------------------------------------------------
	    | Wishlist Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(FavouriteProductController::class)->prefix('favourite/products')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('add',      		'store'  );
	        Route::delete('delete/{id}',    'destroy');
	    });

	    /*
	    |--------------------------------------------------------------------------
	    | Cart Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(CartController::class)->prefix('cart/products')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('create',      		'store'  );
	        Route::patch('edit/{cart}',     'update' );
	        Route::delete('delete/{id}',    'destroy');
	    });

	    /*
	    |--------------------------------------------------------------------------
	    | Orders Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(OrderController::class)->prefix('orders')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('create',      		'store'  );
	        Route::delete('delete/{id}',    'destroy');
	    });

	    /*
	    |--------------------------------------------------------------------------
	    | Rent Cart Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(RentCartController::class)->prefix('rent-cart/products')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('create',      		'store'  );
	        Route::patch('edit/{cart}',     'update' );
	        Route::delete('delete/{id}',    'destroy');
	    });

	    /*
	    |--------------------------------------------------------------------------
	    | Rent Requests Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(RentRequestController::class)->prefix('rent/request')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('create',      		'store'  );
	        Route::delete('delete/{id}',    'destroy');
	    });

	    /*
	    |--------------------------------------------------------------------------
	    | Maintenence Requests Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(MaintenenceRequestController::class)->prefix('maintenence/request')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('create',      		'store'  );
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
	| Banners Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(BannerController::class)->prefix('banners')->group(function () {
    	Route::get('list',		'index');
	});

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
	| Blogs Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(BlogController::class)->prefix('blogs')->group(function () {
    	Route::get('list',		'index'  );
        Route::get('special',	'special');
    	Route::get('view/{id}',	'show'   );
	});

	/*
	|--------------------------------------------------------------------------
	| Products Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(ProductController::class)->prefix('products')->group(function () {
    	Route::get('sale/all',							'saleList'		  		 );
    	Route::get('sale/special',						'saleSpecial'		  	 );
    	Route::get('sale/category_wise/{id}',			'saleCategoryWise'		 );
    	Route::get('rent/all',							'rentList'		  		 );
    	Route::get('rent/special',						'rentSpecial'		  	 );
    	Route::get('rent/category_wise/{id}',			'rentCategoryWise'		 );
    	Route::get('maintenance/all',					'maintenanceList'		 );
    	Route::get('maintenance/special',				'maintenanceSpecial'	 );
    	Route::get('maintenance/category_wise/{id}',	'maintenanceCategoryWise');
    	Route::get('view/{id}',							'show' 		  			 );
    	Route::get('filters',							'filters' 		  		 );
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
