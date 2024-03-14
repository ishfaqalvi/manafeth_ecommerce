<?php

namespace App\Contracts;

interface ProductInterface
{
	public function saleProductList($filter);

	public function saleSpecial($filter);

	public function saleCategoryWise($id);

	public function rentProductList($filter);
	
	public function rentSpecial($filter);

	public function rentCategoryWise($id);

	public function maintenanceProductList($filter);
	
	public function maintenanceSpecial($filter);

	public function maintenanceCategoryWise($id);

	public function viewDetail($id);
}