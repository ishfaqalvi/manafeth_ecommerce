<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rent Order Routes
|--------------------------------------------------------------------------
*/
Route::controller(RentRequestController::class)->prefix('request')->as('rent.')->group(function () {
	Route::get('list',				 'index'	    )->name('index'  	    );
	Route::get('create',			 'create'	    )->name('create' 	    );
	Route::post('store',			 'store'	    )->name('store'  	    );
	Route::get('edit/{id}',			 'edit'		    )->name('edit'	  	    );
	Route::get('show/{id}',			 'show'		    )->name('show'	  	    );
	Route::get('get-rents',			 'getRents'		)->name('getRents'	  	);
	Route::post('update',            'update'	    )->name('update' 	    );
	Route::post('update-detail',     'updateDetail'	)->name('updateDetail'  );
	Route::post('date-extend',       'dateExtend'   )->name('dateExtend'    );
	Route::delete('delete/{id}',	 'destroy'	    )->name('destroy'	    );
	Route::get('time-slots',         'timeSlots'    )->name('timeSlots'     );
    Route::post('add-payment',		 'addPayment'   )->name('addPayment'    );
});

/*
|--------------------------------------------------------------------------
| Rent Chart Routes
|--------------------------------------------------------------------------
*/
Route::controller(RentChartController::class)->prefix('chart')->as('chart.')->group(function () {
	Route::get('list',				 'index'	    )->name('index'  	    );
	Route::get('show/{id}',			 'show'		    )->name('show'	  	    );
});

/*
|--------------------------------------------------------------------------
| Rent Links Routes
|--------------------------------------------------------------------------
*/
Route::controller(RentLinkController::class)->prefix('links')->as('links.')->group(function () {
	Route::get('list',				 'index'	    )->name('index'  	    );
	Route::get('create',			 'create'	    )->name('create' 	    );
	Route::post('store',			 'store'	    )->name('store'  	    );
	Route::get('edit/{id}',			 'edit'		    )->name('edit'	  	    );
	Route::get('show/{id}',			 'show'		    )->name('show'	  	    );
	Route::patch('update/{link}',    'update'	    )->name('update' 	    );
	Route::delete('delete/{id}',	 'destroy'	    )->name('destroy'	    );
    Route::get('get-rents',			 'getRents'		)->name('getRents'	  	);
});
