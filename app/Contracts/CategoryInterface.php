<?php

namespace App\Contracts;

interface CategoryInterface
{
	public function mainList($type = null, $pagination = false);

    public function mainNew();

    public function mainStore($data);

    public function mainFind($id);

	public function mainUpdate($data, $id);

	public function mainDelete($id);

    public function subList($type = null, $pagination = false);

    public function subNew();

	public function subStore($data);

	public function subFind($id);

	public function subUpdate($data, $id);

	public function subDelete($id);
}
