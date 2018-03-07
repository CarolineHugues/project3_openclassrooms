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
}