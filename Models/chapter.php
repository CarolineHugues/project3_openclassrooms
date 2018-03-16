<?php
require_once 'Models/entity.php'; /*A rajouter ?*/

class Chapter extends Entity 
{
	private  $_title,
			 $_author = 'Jean Forteroche',
			 $_content,
			 $_excerpt,
			 $_addDate,
			 $_updateDate,
			 $_publishedDate,
	         $_status = 'draft'; // Chapitre : brouillon ou publié

	const INVALID_TITLE = 1;
	const INVALID_AUTHOR = 2;
	const INVALID_CONTENT = 3;
	const INVALID_EXCERPT = 4; 
	const INVALID_STATUS = 5; 

	public function isValid()
	{
		return !(empty($this->_title) || empty($this->_author) || empty($this->_content) || empty($this->_excerpt) || empty($this->_status));
	}        


	// SETTERS

	public function setTitle($title) 
	{
		if (!is_string($title) || empty($title))
		{
			$this->errors[] = self::INVALID_TITLE;
		}

		$this->_title = $title;
	}

	public function setAuthor($author) 
	{
		if (!is_string($author) || empty($author))
		{
			$this->errors[] = self::INVALID_AUTHOR;
		}

		$this->_author = $author;
	}

	public function setContent($content) 
	{
		if (!is_string($content) || empty($content))
		{
			$this->errors[] = self::INVALID_CONTENT;
		}

		$this->_content = $content;
	}

	public function setExcerpt($excerpt) 
	{
		if (!is_string($excerpt) || empty($excerpt))
		{
			$this->errors[] = self::INVALID_EXCERPT;
		}

		$this->_excerpt = $excerpt;
	}

	public function setAddDate(DateTime $addDate) 
	{
		$this->_addDate = $addDate;
	}

	public function setUpdateDate(DateTime $updateDate) 
	{
		$this->_updateDate = $updateDate;
	}

	public function setPublishedDate(DateTime $publishedDate) 
	{
		$this->_publishedDate = $publishedDate;
	}

	public function setStatus($status) 
	{
		if (($status != 'draft' && $status != 'published') || empty($status))
		{
			$this->errors[] = self::INVALID_STATUS;
		}

		$this->_status = $status;
	}



	// GETTERS

	public function title() 
	{
		return $this->_title;
	}

	public function author() 
	{
		return $this->_author;
	}

	public function content() 
	{
		return $this->_content;
	}

	public function excerpt() 
	{
		return $this->_excerpt;
	}

	public function addDate() 
	{
		return $this->_addDate;

	}

	public function updateDate() 
	{
		return $this->_updateDate;
	}

	public function publishedDate()
	{
		return $this->_publishedDate;
	}

	public function status() 
	{
		return $this->_status;
	}
}