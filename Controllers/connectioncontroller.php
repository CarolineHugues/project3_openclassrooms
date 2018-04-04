<?php

class ConnectionController 
{

	private $_connectionManager,
			   $_chapterManager,
			   $_commentManager,
         $_navigation;

  	public function __construct() 
  	{
    	$this->_connectionManager = new ConnectionManager (PDOFactory::getMysqlConnexion());
    	$this->_chapterManager = new ChapterManager (PDOFactory::getMysqlConnexion());
    	$this->_commentManager = new CommentManager (PDOFactory::getMysqlConnexion());
      $this->_navigation = new Navigation();
  	}

	public function connectionAccess() 
	{
		require 'Views/Backend/connectionView.php';
	}

	public function adminAccess($login, $password) 
	{
		if ($this->_connectionManager->isValid($login, $password))
		{
      $chaptersPerPage = 8;

      /* -------------- Display published chapters with navigation ---------------*/
      $nbPublishedChapters = $this->_chapterManager->countPublished();
      $nbPublishedChaptersListPages = $this->_navigation->CountNbPages($nbPublishedChapters, $chaptersPerPage);
      $curentPublishedChaptersPage = $this->_navigation->getCurrentPage($nbPublishedChapters, $chaptersPerPage);
      $firstEntrance = $this->_navigation->getFirstEntrance($curentPublishedChaptersPage, $chaptersPerPage);
      $chapters = $this->_chapterManager->getPublishedList($firstEntrance, $chaptersPerPage);
      
      /* -------------- Display drafts chapters with navigation -------------------*/ 
      $nbDraftsChapters = $this->_chapterManager->countDrafts();
      $nbDraftsChaptersListPages = $this->_navigation->CountNbPages($nbDraftsChapters, $chaptersPerPage);
      $curentDraftsChaptersPage = $this->_navigation->getCurrentPage($nbDraftsChapters, $chaptersPerPage);
      $firstEntrance = $this->_navigation->getFirstEntrance($curentDraftsChaptersPage, $chaptersPerPage);
      $draftsChapters = $this->_chapterManager->getDraftsList($firstEntrance, $chaptersPerPage);

      $commentsPerPage = 3;

      /* -------------- Display published comments with navigation ------------------*/ 
			$nbPublishedComments = $this->_commentManager->countPublishedComments();
      $nbPublishedCommentsListPages = $this->_navigation->CountNbPages($nbPublishedComments, $commentsPerPage);
      $curentPublishedCommentsPage = $this->_navigation->getCurrentPage($nbPublishedComments, $commentsPerPage);
      $firstEntrance = $this->_navigation->getFirstEntrance($curentPublishedCommentsPage, $commentsPerPage);
      $comments = $this->_commentManager->getPublishedList($firstEntrance, $commentsPerPage);

      /* -------------- Display reported comments with navigation -------------------*/ 
      $nbReportedComments = $this->_commentManager->countReportedComments();
      $nbReportedCommentsListPages = $this->_navigation->CountNbPages($nbReportedComments, $commentsPerPage);
      $curentReportedCommentsPage = $this->_navigation->getCurrentPage($nbReportedComments, $commentsPerPage);
      $firstEntrance = $this->_navigation->getFirstEntrance($curentReportedCommentsPage, $commentsPerPage);
			$reportedComments = $this->_commentManager->getReportedList($firstEntrance, $commentsPerPage);

      $getLogin = $this->_connectionManager->getLogin();

			$view = new BackendView('admin');
    	$view->generate(array('admin', 'chapters' => $chapters, 'draftsChapters' => $draftsChapters, 'nbPublishedChapters' => $nbPublishedChapters, 'nbPublishedChaptersListPages' => $nbPublishedChaptersListPages, 'nbDraftsChapters' => $nbDraftsChapters, 'nbDraftsChaptersListPages' => $nbDraftsChaptersListPages, 'comments' => $comments, 'nbPublishedCommentsListPages' => $nbPublishedCommentsListPages, 'reportedComments' => $reportedComments,'nbReportedCommentsListPages' => $nbReportedCommentsListPages, 'nbPublishedComments' => $nbPublishedComments, 'nbReportedComments' => $nbReportedComments, 'getLogin' => $getLogin));

    	if (isset($_POST['login']) AND isset($_POST['password']))
    	{
    		$_SESSION['login'] = $_POST['login'];
			  $_SESSION['password'] = $_POST['password'];
			}
		}
		else
		{
			echo 'Le pseudo ou le mot de passe est incorrect.';
			require 'Views/Backend/connectionView.php';
		}	
	}

	public function updatePassword($password, $login)
  	{
  		if (empty($_POST['password']))
  		{
  			echo 'Le mot de passe ne peut pas être vide !';
  		}
  		elseif (strlen($_POST['password']) < 6)
  		{
  			echo 'Le mot de passe n\'est pas assez long ! Il doit contenir au moins 6 caractères.';
  		}
  		else
  		{
  			if ($_POST['password'] == $_POST['newpassword'])
  			{
  				$this->_connectionManager->update($password, $login);
  				$view = new BackendView('updatePassword');
    			$view->generate(array('updatePassword'));
  			}
  			else
  			{
  				echo 'Les mots de passe ne correspondent pas !';
  			}
  		}
  	}
}