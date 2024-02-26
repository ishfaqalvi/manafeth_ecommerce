<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(ProductController::class)->as('products.')->group(function (){
	Route::get('list',					 'index'			 )->name('all.index'		       );
	Route::post('list',					 'index'			 )->name('all.filter'		       );
	Route::get('create',				 'create'			 )->name('all.create'	    	   );
	Route::post('store',				 'store'			 )->name('store'		    	   );
	Route::get('edit/{id}',				 'edit'				 )->name('all.edit'		    	   );
	Route::get('show/{id}',				 'show'				 )->name('all.show'		    	   );
	Route::get('search',				 'search'			 )->name('search'		    	   );
	Route::patch('update/{product}',	 'update'			 )->name('update'	    		   );
	Route::delete('delete/{id}',		 'destroy'			 )->name('destroy'	    		   );
	Route::post('prices/store',			 'priceStore'		 )->name('prices.store'			   );
	Route::post('prices/update',		 'priceUpdate'		 )->name('prices.update'		   );
	Route::delete('prices/delete/{id}',	 'priceDestroy'		 )->name('prices.destroy'		   );
	Route::post('images/store',			 'imageStore'		 )->name('images.store'			   );
	Route::delete('images/delete/{id}',	 'imageDestroy' 	 )->name('images.destroy'		   );
	Route::post('related/store',		 'relatedStore'		 )->name('related.store'		   );
	Route::delete('related/delete/{id}', 'relatedDestroy' 	 )->name('related.destroy'		   );
	Route::post('related/check_product', 'relatedProduct'	 )->name('related.checkProduct'	   );
	Route::get('special/frequently',	 'specialFrequently' )->name('special.frequently'	   );
	Route::get('special/featured',	 	 'specialFeatured'	 )->name('special.featured'		   );
	Route::get('special/wellness',	 	 'specialWellness'	 )->name('special.wellness'		   );
	Route::get('special/men-and-woman',	 'specialMenAndWoman')->name('special.men&woman'	   );
	Route::post('special/frequently',	 'specialFrequently' )->name('special.frequentlyFilter');
	Route::post('special/featured',	 	 'specialFeatured'	 )->name('special.featuredFilter'  );
	Route::post('special/wellness',	 	 'specialWellness'	 )->name('special.wellnessFilter'  );
	Route::post('special/men-and-woman', 'specialMenAndWoman')->name('special.men&womanFilter' );
	Route::post('special/store',	 	 'specialStore'		 )->name('special.store'		   );
	Route::delete('special/delete/{id}', 'specialDestroy' 	 )->name('special.destroy'	  	   );
	Route::post('special/check_product', 'checkProduct'		 )->name('special.checkProduct'	   );
	Route::get('sub-categories',    	 'subCategories'	 );
});