<?php

namespace App\Contracts;

interface EmployeeInterface
{
	public function list($filter = null);

	public function new();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);

	public function checkEmail($data);

	public function checkPassword($data);

    public function login($data);

    public function logout();

    public function forgotPassword($data);

    public function resetPassword($data);
}
