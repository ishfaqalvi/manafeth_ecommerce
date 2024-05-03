<?php

namespace App\Contracts;

interface FcmInterface
{
    public function list($guard, $pagination);

	public function new();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);
}
