<?php

namespace App\Contracts;

interface CustomerInterface
{
	public function register($data);

	public function checkCustomer($data);

	public function login($data);

	public function logout();

	public function detail($data);

	public function find($id);

	public function update($data, $id);

	public function forgotPassword($data, $id);

	public function verifiOtp($data, $id);

	public function resetPassword($data, $id);
	
	public function accountVarify($data, $id);

	public function delete($id);
}