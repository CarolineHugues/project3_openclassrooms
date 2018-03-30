<?php

class Connection 
{
	private $_login,
			$_password,
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

	public function login()
	{
		return $this->_login;
	}

}