<?php

namespace App\Contracts;

interface TimeSlotInterface
{
    public function list($pagination);

    public function available($type, $date);

	public function new();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);
}