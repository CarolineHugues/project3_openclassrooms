<?php

class Connection 
{
	private $_login,
			$_password = password_hash($_POST['password'], PASSWORD_DEFAULT),
			$_errors = []; 	

	const INVALID_PASSWORD = 1;

	public function isValid() 
	{
		return !empty($_POST['login']) && !empty($_POST['password']) &&  $this->correspond() != 0 /*Le login correspond au mot de passe*/;
	}

	public function correspond()
	{
		if (password_verify($_POST['password'], password()))
		{
			$request = $this->db->prepare('SELECT COUNT(*) AS valid_correspondence FROM connection WHERE password = :password AND login = :login'); 

			$request->bindValue(':password', password_hash($_POST['password']), PDO::PARAM_STR);
			$request->bindValue(':login', $_POST['login'], PDO::PARAM_STR);

			$data = $request->execute();

			return = $data; 
		}
		else 
		{
			return = 0;
		} 
	}

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
		return this->_errors;
	}

	public function password()
	{
		return this->_password;
	}

}