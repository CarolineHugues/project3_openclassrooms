<?php

require_once 'Models/connectionmanager.php';
require_once 'Models/pdofactory.php';
require_once 'Views/Backend/Backendview.php';


class ConnectionController 
{

	private $_connectionManager,
			$_chapterManager,
			$_commentManager;

  	public function __construct() 
  	{
    	$this->_connectionManager = new ConnectionManager (PDOFactory::getMysqlConnexion());
    	$this->_chapterManager = new ChapterManager (PDOFactory::getMysqlConnexion());
    	$this->_commentManager = new CommentManager (PDOFactory::getMysqlConnexion());
  	}

	public function connectionAccess() 
	{
		require 'Views/Backend/connectionView.php';
	}

	public function adminAccess($login, $password) 
	{
		if ($this->_connectionManager->isValid($login, $password))
		{
			$chapters = $this->_chapterManager->getPublishedList(0,10);
			$draftsChapters = $this->_chapterManager->getDraftsList(0,10);
			$nbPublishedChapters = $this->_chapterManager->countPublished();
			$nbDraftsChapters = $this->_chapterManager->countDrafts();
			$view = new BackendView('admin');
    		$view->generate(array('admin', 'chapters' => $chapters, 'draftsChapters' => $draftsChapters, 'nbPublishedChapters' => $nbPublishedChapters, 'nbDraftsChapters' => $nbDraftsChapters));
		}
		else
		{
			echo 'Le pseudo ou le mot de passe est incorrect.';
			require 'Views/Backend/connectionView.php';
		}	
	}
}