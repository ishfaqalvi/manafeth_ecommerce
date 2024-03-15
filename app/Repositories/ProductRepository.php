<?php

namespace App\Repositories;
use App\Contracts\ProductInterface;
use App\Models\{Product,Category,ProductFeature,ProductSpecification,ProductResource,ProductImage};

class ProductRepository implements ProductInterface
{
	//To view all sale products data
	public function saleProductList($filter)
	{
		return Product::filter($filter)->whereType('Sale')->whereStatus('Publish')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special sale products data
	public function saleSpecial($filter)
	{
		return Product::filter($filter)->whereType('Sale')->whereStatus('Publish')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
	}

	//To view category wise sale products data
	public function saleCategoryWise($id)
	{
		return Product::whereType('Sale')->whereStatus('Publish')->whereCategoryId($id)->get(['id','name']);
	}

	//To view all rent products data
	public function rentProductList($filter)
	{
		return Product::filter($filter)->whereStatus('Publish')->whereType('Rent')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special rent products data
	public function rentSpecial($filter)
	{
		return Product::filter($filter)->whereStatus('Publish')->whereType('Rent')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
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
		return Product::with(['brand','category','subCategory','features','specifications','resources','images'])->find($id);
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

	//To store a product feature
	public function featureStore($data)
	{
		return ProductFeature::create($data);
	}

	//To update a product feature
	public function featureUpdate($data)
	{
		return ProductFeature::find($data['id'])->update($data);
	}

	//To delete a product feature
	public function featureDelete($id)
	{
		return ProductFeature::find($id)->delete();
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
		return ProductImage::create($data);
	}

	//To delete a product images
	public function imageDelete($id)
	{
		return ProductImage::find($id)->delete();
	}
}