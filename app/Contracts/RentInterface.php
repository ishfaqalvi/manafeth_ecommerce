<?php

namespace App\Contracts;

interface RentInterface
{
	public function cartItemList($guard);

	public function cartStoreItem($data, $guard);

	public function cartUpdateItem($data, $id);

	public function cartDeleteItem($id);

	public function orderList($gurard);

	public function orderFind($id);

	public function orderStore($data, $guard);

    public function orderNew();

	public function orderUpdate($data, $id, $guard);

	public function orderDelete($id);

    public function orderReview($data);

    public function dateExtend($date, $id);
}
