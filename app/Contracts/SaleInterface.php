<?php

namespace App\Contracts;

interface SaleInterface
{
	public function cartItemList();

	public function cartCheckItem($id);

	public function cartStoreItem($data);

	public function cartUpdateItem($data, $id);

	public function cartDeleteItem($id);

	public function orderList($customer_id);

	public function orderFind($id);

	public function orderStore($data,$customer_id);

	public function orderUpdate($data, $id);

	public function orderDelete($id);
}