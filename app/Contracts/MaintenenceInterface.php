<?php

namespace App\Contracts;

interface MaintenenceInterface
{
	public function list($guard, $pagination);

	public function create();

	public function store($guard, $data);

	public function find($id);

	public function update($data, $id, $guard);

	public function delete($id);
}
