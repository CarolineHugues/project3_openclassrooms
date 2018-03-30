<?php

require_once 'Models/connection.php';

class ConnectionManager extends Manager 
{
	public function getLogin()
	{
		$request = $this->db->query('SELECT login FROM connection');

		$login = $request->fetchColumn();

		return $login;
	}

	public function update($password, $login) 
	{
		$request = $this->db->prepare('UPDATE connection SET password = :password WHERE login = :login');

		$request->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
		$request->bindValue(':login', $login);

		$request->execute();

		$request->closeCursor(); 
	}

	public function isValid($login, $password) 
	{
		return !empty($login) && !empty($password) && $this->correspond($login, $password) == true;
	}

	public function correspond($login, $password)
	{   
		$request = $this->db->prepare('SELECT * FROM connection WHERE login = :login');
		$request->execute(array('login' => $login));
		$data = $request->fetch();

		if ($login != $data['login'])
		{
			return false;
		}
		else 
		{
			$isPasswordCorrect = password_verify($password, $data['password']);
			return $isPasswordCorrect;
		}
	}
}