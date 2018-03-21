<?php

require_once 'Models/connectionmanager.php';
require_once 'Models/pdofactory.php';


class ConnectionController 
{

	private $_connectionManager;

  	public function __construct() 
  	{
    	$this->_connectionManager = new ConnectionManager (PDOFactory::getMysqlConnexion());
  	}

	public function connectionAccess() 
	{
		require 'Views/Backend/connectionView.php';
	}

	public function adminAccess($login, $password) 
	{
		if ($this->_connectionManager->isValid($login, $password))
		{
			require 'Views/Backend/adminView.php';
		}
		else
		{
			echo 'Le pseudo ou le mot de passe est incorrect.';
			require 'Views/Backend/connectionView.php';
		}	
	}
}