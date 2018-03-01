<?php

class Comment extends Entity
{
	private  $_author,
			 $_content,
			 $_publishedDate,
			 $_authorMail,
			 $_status = 'published'; // Commentaire : publié ou signalé

	const INVALID_AUTHOR = 1;
	const INVALID_CONTENT= 2;
	const INVALID_AUTHORMAIL = 3;
	const INVALID_STATUS = 4; 

	public function isValid()
	{
		return !(empty($this->author) || empty($this->content) || empty($this->authorMail) || empty($this->status));
	}  		 

	//SETTERS

	public function setAuthor($author) 
	{
		if (!is_string($author) || empty($author))
		{
			$this->errors[] = self::INVALID_AUTHOR;
		}

		$this->author = $author;
	}

	public function setContent($content) 
	{
		if (!is_string($content) || empty($content))
		{
			$this->errors[] = self::INVALID_CONTENT;
		}

		$this->content = $content;
	}

	public function setPublishedDate(DateTime $pubishedDate) 
	{
		$this->publishedDate = $publishedDate;
	}

	public function setAuthorMail($authorMail) 
	{
		if (!is_string($authorMail) || empty($authorMail))
		{
			$this->errors[] = self::INVALID_AUTHORMAIL;
		}

		$this->authorMail = $authorMail;
	}

	public function setStatus($status) 
	{
		if (!is_string($status) || empty($status) || ($status != 'published' && $status != 'reported'))
		{
			$this->errors[] = self::INVALID_STATUS;
		}

		$this->status = $status;
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
}