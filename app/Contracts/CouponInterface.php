<?php

namespace App\Contracts;

interface CouponInterface
{
    public function promoCodeList($pagination);

	public function promoCodeNew();

	public function promoCodeStore($data);

	public function promoCodeFind($id);

	public function promoCodeUpdate($data, $id);

	public function promoCodeDelete($id);

	public function apply($guard, $code);

	public function discount($guard);
}
