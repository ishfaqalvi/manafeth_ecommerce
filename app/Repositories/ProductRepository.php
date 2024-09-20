<?php

namespace App\Repositories;
use App\Contracts\ProductInterface;
use Auth;
use App\Models\{
	Brand,Product,Category,SubCategory,ProductFeature,ProductSpecification,ProductResource,ProductImage,FavouriteProduct
};

class ProductRepository implements ProductInterface
{
    //To view all sale products data
    public function saleAdminList($filter)
    {
        return Product::filter($filter)->whereType('Sale')->with(['brand','category','subCategory','reviews.order.customer'])->paginate();
    }

	//To view all sale products data
	public function saleProductList($filter)
	{
		return Product::filter($filter)->whereType('Sale')->whereStatus('Publish')->with(['brand','category','subCategory','reviews.order.customer'])->paginate();
	}

	//To view special sale products data
	public function saleSpecial($filter)
	{
		return Product::filter($filter)->whereType('Sale')->whereStatus('Publish')->whereSpecial('Yes')->with(['brand','category','subCategory','reviews.order.customer'])->paginate();
	}

	//To view category wise sale products data
	public function saleCategoryWise($id)
	{
		return Product::whereType('Sale')->whereStatus('Publish')->whereCategoryId($id)->get(['id','name']);
	}

	//To view all rent products data
	public function rentProductList($filter = null, $pagination = true)
	{
        $query = Product::query();
        if(isset($filter))
        {
            $query->filter($filter)->whereStatus('Publish')->whereType('Rent')->with(['brand','category','subCategory','rents']);
        }
        $query->whereStatus('Publish')->whereType('Rent')->with(['brand','category','subCategory','rents']);

		return $pagination ? $query->paginate() : $query->get();
	}

    //To view all rent products data
	public function rentAdminList($filter)
	{
		return Product::filter($filter)->whereType('Rent')->with(['brand','category','subCategory','rents'])->paginate();
	}

	//To view special rent products data
	public function rentSpecial($filter)
	{
		return Product::filter($filter)->whereStatus('Publish')->whereType('Rent')->whereSpecial('Yes')->with(['brand','category','subCategory','rents'])->paginate();
	}

	//To view category wise rent products data
	public function rentCategoryWise($id)
	{
		return Product::whereType('Rent')->whereStatus('Publish')->whereCategoryId($id)->get(['id','name']);
	}

	//To view all maintence products data
	public function maintenanceProductList($filter)
	{
		return Product::filter($filter)->whereStatus('Publish')->whereType('Maintenance')->with(['brand','category','subCategory'])->paginate();
	}

    //To view all maintence products data
	public function maintenanceAdminList($filter)
	{
		return Product::filter($filter)->whereType('Maintenance')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special maintence products data
	public function maintenanceSpecial($filter)
	{
		return Product::filter($filter)->whereStatus('Publish')->whereType('Maintenance')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
	}

	//To view category wise maintence products data
	public function maintenanceCategoryWise($id)
	{
		return Product::whereType('Maintenance')->whereStatus('Publish')->whereCategoryId($id)->get(['id','name']);
	}

	//To view category wise maintence products data
	public function viewDetail($id)
	{
		return Product::with(['brand','category','subCategory','specifications','resources','images','rents','reviews.order.customer'])->find($id);
	}

	//To create a new product
	public function create()
	{
		return new Product();
	}

	//To store a new product
	public function store($data)
	{
		return Product::create($data);
	}

	//To view a product detail
	public function show($id)
	{
		return Product::find($id);
	}

	//To edit a product detail
	public function edit($id)
	{
		return Product::find($id);
	}

	//To update a product detail
	public function update($data, $id)
	{
		return Product::find($id)->update($data);
	}

	//To delete a product
	public function delete($id)
	{
		return Product::find($id)->delete();
	}

	//To store a product specification
	public function specificationStore($data)
	{
		return ProductSpecification::create($data);
	}

	//To update a product specification
	public function specificationUpdate($data)
	{
		return ProductSpecification::find($data['id'])->update($data);
	}

	//To delete a product specification
	public function specificationDelete($id)
	{
		return ProductSpecification::find($id)->delete();
	}

	//To store a product resource
	public function resourceStore($data)
	{
		return ProductResource::create($data);
	}

	//To update a product resource
	public function resourceUpdate($data)
	{
		return ProductResource::find($data['id'])->update($data);
	}

	//To delete a product resource
	public function resourceDelete($id)
	{
		return ProductResource::find($id)->delete();
	}

	//To store a product images
	public function imageStore($data)
	{
        foreach($data['images'] as $image){
            $data['image'] = $image;
            ProductImage::create($data);
        }
		return true; 
	}

	//To delete a product images
	public function imageDelete($id)
	{
		return ProductImage::find($id)->delete();
	}

	//To get filters of a products
    public function filters($type = null, $categoryId = null, $subCategoryId = null)
    {
        $query = Product::query();

        if (!empty($type)) {
            $query->where('type', $type);
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        if (!empty($subCategoryId)) {
            $query->where('sub_category_id', $subCategoryId);
        }

        $minPrice = $query->min('price');
        $maxPrice = $query->max('price');

        $categories = Category::get(['id', 'name']);
        $subCategories = SubCategory::get(['id', 'name']);
        $brands = Brand::get(['id', 'name']);

        if (!empty($categoryId)) {
            $subCategories = SubCategory::where('category_id', $categoryId)->get(['id', 'name']);
            $brands = Brand::whereHas('products', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get(['id', 'name']);
        }

        if (!empty($subCategoryId)) {
            $brands = Brand::whereHas('products', function ($query) use ($subCategoryId) {
                $query->where('sub_category_id', $subCategoryId);
            })->get(['id', 'name']);
        }

        return [
            'categories'     => $categories,
            'sub_categories' => $subCategories,
            'brands'         => $brands,
            'products'       => [
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice
            ]
        ];
    }

    //To view all favourite products
	public function favouriteList($guard)
	{
        return Auth::guard($guard)->user()->favouriteProducts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

    //To store a product favourite
	public function favouriteStore($data, $guard)
	{
        $product = $data['product_id'];
        $checkProduct = Auth::guard($guard)->user()->favouriteProducts()->whereProductId($product)->first();
        if ($checkProduct) {
            return false;
        }
        FavouriteProduct::create(['customer_id' => Auth::guard($guard)->user()->id, 'product_id' => $product]);
        return true;
	}

	//To delete a product favourite
	public function favouriteRemove($id)
	{
		return FavouriteProduct::find($id)->delete();
	}
}
