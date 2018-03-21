<?php

class ConnectionManager extends Manager 
{
	public function update(Connection $connection) 
	{
		$request = $this->db->prepare('UPDATE connection SET password = :password WHERE login = :login');

		$request->bindValue(':password', $connection->password());

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