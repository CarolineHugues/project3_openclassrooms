<?php

abstract class Manager 
{
	protected  $db;

	public function __construct($db) 
	{
		$this->setDb($db);
	}

	public function setDb($db) 
	{
		$this->db = $db;
	}
}