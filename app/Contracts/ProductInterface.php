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

	public function create();

	public function store($data);

	public function show($id);

	public function edit($id);

	public function update($data, $id);

	public function delete($id);

	public function featureStore($data);

	public function featureUpdate($data);

	public function featureDelete($id);

	public function specificationStore($data);

	public function specificationUpdate($data);

	public function specificationDelete($id);

	public function resourceStore($data);

	public function resourceUpdate($data);

	public function resourceDelete($id);

	public function imageStore($data);

	public function imageDelete($id);

	public function filters($type = null);

    public function favouriteList();

    public function favouriteStore($data);

    public function favouriteRemove($id);
}
