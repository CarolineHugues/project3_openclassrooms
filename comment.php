<?php

class Comment extends Entity
{
	private  $_author,
			 $_content,
			 $_publishedDate,
			 $_authorMail,
			 $_status = 'published', // Commentaire : publié ou signalé
			 $_idChapter;

	const INVALID_AUTHOR = 1;
	const INVALID_CONTENT= 2;
	const INVALID_AUTHORMAIL = 3;
	const INVALID_STATUS = 4; 

	public function isValid()
	{
		return !(empty($this->_author) || empty($this->_content) || empty($this->_authorMail) || empty($this->_status));
	}  		 

	//SETTERS

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

	public function setPublishedDate(DateTime $publishedDate) 
	{
		$this->_publishedDate = $publishedDate;
	}

	public function setAuthorMail($authorMail) 
	{
		if (!is_string($authorMail) || empty($authorMail))
		{
			$this->errors[] = self::INVALID_AUTHORMAIL;
		}

		$this->_authorMail = $authorMail;
	}

	public function setStatus($status) 
	{
		if (($status != 'published' && $status != 'reported') || empty($status))
		{
			$this->errors[] = self::INVALID_STATUS;
		}

		$this->_status = $status;
	}

	public function setIdChapter($idChapter) 
	{
		$this->_idChapter = (int) $idChapter;
	}

	// GETTERS

	public function author() 
	{
		return $this->_author;
	}

	public function content() 
	{
		return $this->_content;
	}

	public function publishedDate() 
	{
		return $this->_publishedDate;
	}

	public function authorMail() 
	{
		return $this->_authorMail;
	}

	public function status() 
	{
		return $this->_status;
	}

	public function idChapter() 
	{
		return $this->_idChapter;
	}
}