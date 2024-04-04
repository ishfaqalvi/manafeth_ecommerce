<?php

namespace App\Contracts;

interface CustomerInterface
{
	public function register($data);

	public function verifyOTP($data);

    public function verifyAccount($data);

	public function webLogin($credentials, $email);

    public function webLogout();

	public function appLogin($data);

    public function appLogout();

    public function view();

    public function update($data, $id);

	public function forgotPassword($data);

	public function resetPassword($data);

	public function delete($id);

    public function checkEmail($data);

    public function verifyEmail($data);

	public function checkPassword($data);

	public function addressList($id);

	public function addressNew();

	public function addressStore($data);

	public function addressFind($id);

	public function addressUpdate($data, $id);

	public function addressDelete($id);
}
