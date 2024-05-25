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
        | Address Route
        |--------------------------------------------------------------------------
        */
        Route::controller(AddressController::class)->prefix('address')->as('address.')->group(function () {
            Route::get('list',			    'index'  )->name('index' );
            Route::post('store',		    'store'  )->name('store' );
            Route::post('update',	        'update' )->name('update');
            Route::delete('delete/{id}',    'destroy')->name('delete');
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
	        Route::get('list',             	'index'        );
	        Route::post('create',      		'store'        );
	        Route::post('cancel',      		'cancel'       );
	        Route::delete('delete/{id}',    'destroy'      );
	        Route::post('reviews',      	'reviews'      );
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
            Route::post('cancel',      		'cancel' );
	        Route::delete('delete/{id}',    'destroy');
            Route::post('reviews',      	'reviews');
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

		/*
	    |--------------------------------------------------------------------------
	    | FCM Notifications Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(FcmNotificationController::class)->prefix('fcm-notifications')->group(function(){
	        Route::get('list',             	'index' );
	        Route::get('read/{id}',      	'read'  );
	    });

        /*
	    |--------------------------------------------------------------------------
	    | Coupon Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(CouponController::class)->prefix('coupons')->group(function(){
	        Route::post('apply',            'apply'     );
	        Route::get('discount',      	'discount'  );
	    });

        /*
	    |--------------------------------------------------------------------------
	    | Feedback Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(FeedbackController::class)->prefix('feedbacks')->group(function(){
	        Route::post('create',            'store' );
	    });
	});
});

/*
|--------------------------------------------------------------------------
| Employee API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'employee', 'namespace'=>'App\Http\Controllers\API\Employee'], function(){
	/*
	|--------------------------------------------------------------------------
	| Public Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(AuthController::class)->prefix('auth')->group(function () {
    	Route::post('login',			'login'			);
    	Route::post('forgot_password',  'forgotPass'	);
        Route::post('reset_password',   'resetPass' 	);
	});

	/*
	|--------------------------------------------------------------------------
	| Protected Routes
	|--------------------------------------------------------------------------
	*/
	Route::middleware('auth:sanctum,employee')->group(function () {
	    /*
	    |--------------------------------------------------------------------------
	    | Auth Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(AuthController::class)->prefix('auth')->group(function () {
	        Route::get('view',                  'view'          );
	        Route::post('update',               'update'        );
	        Route::get('logout',                'logout'        );
	        Route::post('check_old_password',   'checkOldPass'  );

	    });

        /*
	    |--------------------------------------------------------------------------
	    | Orders Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(EmployeeController::class)->group(function(){
	        Route::get('drivers',          'drivers');
	    });

        /*
	    |--------------------------------------------------------------------------
	    | Orders Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(OrderController::class)->prefix('orders')->group(function(){
	        Route::get('list',             	'index'  );
	        Route::post('update',      		'update' );
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

		/*
	    |--------------------------------------------------------------------------
	    | FCM Notifications Route
	    |--------------------------------------------------------------------------
	    */
	    Route::controller(FcmNotificationController::class)->prefix('fcm-notifications')->group(function(){
	        Route::get('list',             	'index' );
	        Route::get('read/{id}',      	'read'  );
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
	| Top Searches Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(TopSearchController::class)->prefix('top-searches')->group(function () {
    	Route::get('list',		'index');
        Route::post('create',	'store');
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
    | Time Slots Route
    |--------------------------------------------------------------------------
    */
    Route::controller(TimeSlotController::class)->prefix('time-slots')->group(function(){
        Route::get('list',  'index' );
    });
});
