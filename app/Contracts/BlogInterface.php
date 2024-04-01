<?php

namespace App\Contracts;

interface BlogInterface
{
	public function paginationList();

	public function simpleList();

	public function specialList();

	public function create();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);
}
