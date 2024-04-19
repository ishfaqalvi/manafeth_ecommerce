<?php

namespace App\Contracts;

interface SaleInterface
{
	public function cartItemList($guard);

	public function cartStoreItem($data, $guard);

	public function cartUpdateItem($data, $id);

	public function cartDeleteItem($id);

	public function orderList($customer_id);

	public function orderFind($id);

	public function orderStore($data,$customer_id);

	public function orderUpdate($data, $id);

	public function orderDelete($id);
}
