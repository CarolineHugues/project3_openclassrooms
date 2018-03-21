<?php

class Connection 
{
	private $_login,
			$_password = password_hash($_POST['password'], PASSWORD_DEFAULT),
			$_errors = []; 	

	const INVALID_PASSWORD = 1;

	// SETTERS
	
	public function setPassword($password) 
	{
		if (!is_string($password) || empty($password))
		{
			$this->_errors[] = self::INVALID_PASSWORD;
		}

		$this->_password = $password;
	}


	// GETTERS

	public function errors()
	{
		return $this->_errors;
	}

	public function password()
	{
		return $this->_password;
	}

}