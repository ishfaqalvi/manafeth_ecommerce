<?php

namespace App\Contracts;

interface BannerInterface
{
	public function groupByList();

	public function list($filter);

	public function create();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);
}