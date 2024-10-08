<?php

namespace App\Contracts;

interface MaintenenceInterface
{
	public function list($guard, $pagination, $filters);

	public function create();

	public function store($guard, $data);

	public function find($id);

	public function update($data, $id, $guard);

    public function addPayment($data);

	public function delete($id);
}
