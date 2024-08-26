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

    public function addPayment($data);

	public function orderDelete($id);

    public function orderReview($data);

    public function dateExtend($data);

    public function linkList();

	public function linkCreate();

	public function linkStore($data);

	public function linkFind($id);

    public function linkSearch($colums);

	public function linkUpdate($data, $link);

	public function linkDelete($id);

}
