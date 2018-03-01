<?php

abstract class Manager 
{
	private  $_db;

	public function __construct($db) 
	{
		$this->setDb($db);
	}

	public function setDb(PDO $db) 
	{
		$this->_db = $db;
	}
}