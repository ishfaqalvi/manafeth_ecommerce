<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(ProductController::class)->as('products.')->group(function () {
	Route::get('list',							'index'				  )->name('index'		 		 );
	Route::post('list',							'index'				  )->name('filter'				 );
	Route::get('create',						'create'			  )->name('create'	 			 );
	Route::post('store',						'store'				  )->name('store'		 		 );
	Route::get('edit/{id}',						'edit'				  )->name('edit'		 		 );
	Route::get('show/{id}',						'show'    			  )->name('show'		 		 );
	Route::patch('update/{product}',			'update'			  )->name('update'	 			 );
	Route::delete('delete/{id}',				'destroy'			  )->name('destroy'	 			 );
	Route::post('feature/store',				'featureStore'		  )->name('feature.store'		 );
	Route::post('feature/update',				'featureUpdate'		  )->name('feature.update'		 );
	Route::delete('feature/delete/{id}',	 	'featureDestroy'	  )->name('feature.destroy'		 );
	Route::post('specification/store',			'specificationStore'  )->name('specification.store'	 );
	Route::post('specification/update',			'specificationUpdate' )->name('specification.update' );
	Route::delete('specification/delete/{id}',	'specificationDestroy')->name('specification.destroy');
	Route::post('resource/store',				'resourceStore'		  )->name('resource.store'		 );
	Route::post('resource/update',				'resourceUpdate' 	  )->name('resource.update' 	 );
	Route::delete('resource/delete/{id}',	 	'resourceDestroy'	  )->name('resource.destroy'	 );
	Route::post('images/store',			 		'imageStore'		  )->name('images.store'		 );
	Route::delete('images/delete/{id}',	 		'imageDestroy' 	 	  )->name('images.destroy'		 );
	Route::get('sub-categories',    			'subCategories'		  );
});