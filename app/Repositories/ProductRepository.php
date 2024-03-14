<?php

namespace App\Repositories;
use App\Contracts\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{
	//To view all sale products data
	public function saleProductList($filter)
	{
		return Product::filter($filter)->whereType('Sale')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special sale products data
	public function saleSpecial($filter)
	{
		return Product::filter($filter)->whereType('Sale')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
	}

	//To view category wise sale products data
	public function saleCategoryWise($id)
	{
		return Product::whereType('Sale')->whereCategoryId($id)->get(['id','name']);
	}

	//To view all rent products data
	public function rentProductList($filter)
	{
		return Product::filter($filter)->whereType('Rent')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special rent products data
	public function rentSpecial($filter)
	{
		return Product::filter($filter)->whereType('Rent')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
	}

	//To view category wise rent products data
	public function rentCategoryWise($id)
	{
		return Product::whereType('Rent')->whereCategoryId($id)->get(['id','name']);
	}

	//To view all maintence products data
	public function maintenanceProductList($filter)
	{
		return Product::filter($filter)->whereType('Maintenance')->with(['brand','category','subCategory'])->paginate();
	}

	//To view special maintence products data
	public function maintenanceSpecial($filter)
	{
		return Product::filter($filter)->whereType('Maintenance')->whereSpecial('Yes')->with(['brand','category','subCategory'])->paginate();
	}

	//To view category wise maintence products data
	public function maintenanceCategoryWise($id)
	{
		return Product::whereType('Maintenance')->whereCategoryId($id)->get(['id','name']);
	}

	//To view category wise maintence products data
	public function viewDetail($id)
	{
		return Product::with(['brand','category','subCategory','features','specifications','resources','images'])->find($id);
	}
}