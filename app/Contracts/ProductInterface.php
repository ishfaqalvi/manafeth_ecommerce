<?php

namespace App\Contracts;

interface ProductInterface
{
	public function saleAdminList($filter);

	public function saleProductList($filter);

	public function saleSpecial($filter);

	public function saleCategoryWise($id);

	public function rentAdminList($filter);

	public function rentProductList($filter);

	public function rentSpecial($filter);

	public function rentCategoryWise($id);

	public function maintenanceAdminList($filter);

	public function maintenanceProductList($filter);

	public function maintenanceSpecial($filter);

	public function maintenanceCategoryWise($id);

	public function viewDetail($id);

	public function create();

	public function store($data);

	public function show($id);

	public function edit($id);

	public function update($data, $id);

	public function delete($id);

	public function specificationStore($data);

	public function specificationUpdate($data);

	public function specificationDelete($id);

	public function resourceStore($data);

	public function resourceUpdate($data);

	public function resourceDelete($id);

	public function imageStore($data);

	public function imageDelete($id);

	public function filters($type = null, $categoryId = null, $subCategoryId = null);

    public function favouriteList($guard);

    public function favouriteStore($data, $guard);

    public function favouriteRemove($id);
}
