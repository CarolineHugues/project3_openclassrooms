<?php 

abstract class Entity
{
	protected $errors = [],
			  $id;

	public function __construct(array $data = []) 
	{
		if(!empty($data))
		{
			$this->hydrate($data);
		}
	}

	public function isNew()
	{
		return empty($this->id);
	}


	public function hydrate($data) 
	{
		foreach ($data as $attribute => $value) 
		{
			$method = 'set'.ucfirst($attribute);

			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}

	//GETTERS

	public function errors()
	{
		return this->errors;
	}

	public function id()
	{
		return this->id;
	}

	// SETTERS

	public function setId($id) 
	{ /
		$this->id = (int) id;
	}
}