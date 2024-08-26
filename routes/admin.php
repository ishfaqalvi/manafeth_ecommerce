<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/
Route::get('dashboard', DashboardController::class)->name('dashboard');

/*
|--------------------------------------------------------------------------
| Orders Routes
|--------------------------------------------------------------------------
*/
Route::controller(OrderController::class)->prefix('orders')->as('orders.')->group(function () {
	Route::get('list',				 'index'	 )->name('index'  	 );
	Route::get('create',			 'create'	 )->name('create' 	 );
	Route::post('store',			 'store'	 )->name('store'  	 );
	Route::get('show/{id}',			 'show'		 )->name('show'	  	 );
	Route::get('edit/{id}',			 'edit'		 )->name('edit'	  	 );
	Route::get('complete/{id}',		 'complete'  )->name('complete'	 );
	Route::post('update',            'update'	 )->name('update' 	 );
	Route::post('confirm',           'confirm'	 )->name('confirm' 	 );
	Route::post('completed',         'completed' )->name('completed' );
	Route::delete('delete/{id}',	 'destroy'	 )->name('destroy'	 );
    Route::post('services',          'services'	 )->name('services'  );
	Route::get('time-slots',         'timeSlots' )->name('timeSlots' );
    Route::post('add-payment',		 'addPayment')->name('addPayment');
});

/*
|--------------------------------------------------------------------------
| Maintenence Requests Routes
|--------------------------------------------------------------------------
*/
Route::controller(MaintenenceRequestController::class)->prefix('maintenance/request')->as('maintenance.')->group(function () {
	Route::get('list',				 'index'	  )->name('index'  	   );
	Route::get('create',			 'create'	  )->name('create' 	   );
	Route::post('store',			 'store'	  )->name('store'  	   );
	Route::get('show/{id}',			 'show'		  )->name('show'	   );
	Route::post('update',            'update'	  )->name('update' 	   );
	Route::delete('delete/{id}',	 'destroy'	  )->name('destroy'	   );
	Route::get('get-products', 		 'getProducts')->name('getProducts');
    Route::post('add-payment',		 'addPayment' )->name('addPayment' );
});

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::controller(CustomerController::class)->prefix('customers')->as('customers.')->group(function () {
	Route::get('list',				 'index'	 )->name('index'  	 );
	Route::get('create',			 'create'	 )->name('create' 	 );
	Route::post('store',			 'store'	 )->name('store'  	 );
	Route::get('edit/{id}',			 'edit'		 )->name('edit'	  	 );
	Route::get('show/{id}',			 'show'		 )->name('show'	  	 );
	Route::patch('update/{user}',    'update'	 )->name('update' 	 );
	Route::delete('delete/{id}',	 'destroy'	 )->name('destroy'	 );
	Route::post('check-email', 		 'checkEmail')->name('checkEmail');
});

/*
|--------------------------------------------------------------------------
| Banners Routes
|--------------------------------------------------------------------------
*/
Route::controller(BannerController::class)->prefix('banners')->as('banners.')->group(function () {
	Route::get('list',					'index'			)->name('index'		 	);
	Route::get('create',				'create'		)->name('create'	 	);
	Route::post('store',				'store'			)->name('store'		 	);
	Route::get('edit/{id}',				'edit'			)->name('edit'		 	);
	Route::get('show/{id}',				'show'			)->name('show'		 	);
	Route::patch('update/{banner}',		'update'		)->name('update'	 	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	 	);
});

/*
|--------------------------------------------------------------------------
| Brands Routes
|--------------------------------------------------------------------------
*/
Route::controller(BrandController::class)->prefix('brands')->as('brands.')->group(function () {
	Route::get('list',					'index'			)->name('index'		 	);
	Route::get('create',				'create'		)->name('create'	 	);
	Route::post('store',				'store'			)->name('store'		 	);
	Route::get('edit/{id}',				'edit'			)->name('edit'		 	);
	Route::get('show/{id}',				'show'			)->name('show'		 	);
	Route::patch('update/{brand}',		'update'		)->name('update'	 	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	 	);
});

/*
|--------------------------------------------------------------------------
| Top Search Routes
|--------------------------------------------------------------------------
*/
Route::controller(TopSearchController::class)->prefix('top-searches')->as('top-searches.')->group(function () {
	Route::get('list',					'index'			)->name('index'		 	);
	Route::get('create',				'create'		)->name('create'	 	);
	Route::post('store',				'store'			)->name('store'		 	);
	Route::get('edit/{id}',				'edit'			)->name('edit'		 	);
	Route::get('show/{id}',				'show'			)->name('show'		 	);
	Route::patch('update/{topSearch}',	'update'		)->name('update'	 	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	 	);
});

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/
Route::controller(BlogController::class)->prefix('blogs')->as('blogs.')->group(function () {
	Route::get('list',					'index'			)->name('index'		 	);
	Route::get('create',				'create'		)->name('create'	 	);
	Route::post('store',				'store'			)->name('store'		 	);
	Route::get('edit/{id}',				'edit'			)->name('edit'		 	);
	Route::get('show/{id}',				'show'			)->name('show'		 	);
	Route::patch('update/{blog}',		'update'		)->name('update'	 	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	 	);
});

/*
|--------------------------------------------------------------------------
| FCM Notifications Routes
|--------------------------------------------------------------------------
*/
Route::resource('fcm-notifications', FcmNotificationController::class);

/*
|--------------------------------------------------------------------------
| Time Slots Routes
|--------------------------------------------------------------------------
*/
Route::resource('time-slots', TimeSlotController::class);

/*
|--------------------------------------------------------------------------
| Promo Codes Routes
|--------------------------------------------------------------------------
*/
Route::resource('promo-codes', PromoCodeController::class);

/*
|--------------------------------------------------------------------------
| Feedbacks Routes
|--------------------------------------------------------------------------
*/
Route::controller(FeedbackController::class)->prefix('feedbacks')->as('feedbacks.')->group(function () {
	Route::get('list',					'index'			)->name('index'		 	);
	Route::delete('delete/{id}',		'destroy'		)->name('destroy'	 	);
});

/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/
Route::resource('roles', RoleController::class);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::controller(UserController::class)->prefix('users')->as('users.')->group(function () {
	Route::get('list',				'index'			)->name('index'		   );
	Route::get('create',			'create'		)->name('create'	   );
	Route::post('store',			'store'			)->name('store'		   );
	Route::get('edit/{id}',			'edit'			)->name('edit'		   );
	Route::get('show/{id}',			'show'			)->name('show'		   );
	Route::patch('update/{user}',	'update'		)->name('update'	   );
	Route::delete('delete/{id}',	'destroy'		)->name('destroy'	   );
	Route::get('profile', 		 	'profileEdit'	)->name('profileEdit'  );
    Route::post('profile',		 	'profileUpdate'	)->name('profileUpdate');
    Route::post('check_email', 	 	'checkEmail'	)->name('checkEmail'   );
    Route::post('check_password',	'checkPassword'	)->name('checkPassword');
    Route::post('save-token',       'saveToken'     )->name('saveToken'    );
    Route::post('save-player-id',   'savePlayerId'  )->name('savePlayerId' );
});

/*
|--------------------------------------------------------------------------
| Notifications Routes
|--------------------------------------------------------------------------
*/
Route::controller(NotificationController::class)->prefix('notifications')->as('notifications.')->group(function () {
	Route::get('index', 		  	'index'  )->name('index'  );
	Route::get('show/{id}', 		'show'   )->name('show'	  );
	Route::get('read/{id}', 		'read'   )->name('read'	  );
	Route::get('read-all', 		    'readAll')->name('readAll');
	Route::delete('destroy/{id}', 	'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Audit Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuditController::class)->prefix('audits')->as('audits.')->group(function () {
	Route::get('index', 		 	'index'	 )->name('index'  );
	Route::get('show/{id}', 	 	'show'	 )->name('show'	  );
	Route::delete('destroy/{id}',	'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function () {
	Route::get('general', 		'general'	)->name('general'	  );
	Route::get('whatsapp', 		'whatsapp'	)->name('whatsapp'	  );
	Route::get('fcm', 		    'fcm'		)->name('fcm'		  );
	Route::get('clear-cache', 	'clearCache')->name('clear-cache' );
	Route::post('save', 		'save'		)->name('save'		  );
	Route::get('test-notification', 'testNotification')->name('testNotification');
});

/*
|--------------------------------------------------------------------------
| Error Log Route
|--------------------------------------------------------------------------
*/
Route::get('logs',
	[\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']
)->name('logs');
