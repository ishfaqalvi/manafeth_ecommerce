<?php

namespace App\Contracts;

interface SaleInterface
{
	public function cartItemList($guard);

	public function cartStoreItem($data, $guard);

	public function cartUpdateItem($data, $id);

	public function cartDeleteItem($id);

	public function orderList($customer_id, $employee_id, $pagination, $filters);

	public function orderNew();

	public function orderFind($id);

	public function orderStore($data,$customer_id);

	public function orderConfirm($data, $id);

	public function orderUpdate($data, $id, $guard);

    public function addPayment($data);

	public function orderDelete($id);

    public function orderReview($data);

    public function storeServices($orderDetailId);

    public function updateServices($id);
}
