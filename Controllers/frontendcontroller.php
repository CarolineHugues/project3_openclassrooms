<?php

require_once 'Models/chaptermanager.php';
require_once 'Models/commentmanager.php';
require_once 'Models/pdofactory.php';
require_once 'Views/frontend/view.php';


class FrontendController {

	private $_chapterManager,
			$_commentManager;

  	public function __construct() 
  	{
    	$this->_chapterManager = new ChapterManager (PDOFactory::getMysqlConnexion());
    	$this->_commentManager = new CommentManager (PDOFactory::getMysqlConnexion());
  	}

	public function listChapters()
	{
    	$chapters = $this->_chapterManager->getPublishedList(0,4);
    	$view = new View('listChapters');
    	$view->generate(array('chapters' => $chapters));
	}

	public function chapter($id)
	{
		$chapter = $this->_chapterManager->getUnique($id);
    	$comments = $this->_commentManager->getListOf($chapter->id());
    	$view = new View('chapter');
    	$view->generate(array('chapter' => $chapter, 'comments' => $comments));
	}

	public function addComment($comment, $chapterId)
	{
		if (empty($_POST['author']))
       	{
            echo 'Vous devez renseigner votre nom !';
        }
       	else if (empty($_POST['authorMail']))
        {
            echo 'Vous devez renseigner votre mail !';
        }
        else if (empty($_POST['content']))
        {
            echo 'Vous devez renseigner le contenu de votre commentaire !';
        }
        else 
        {
			$this->_commentManager->add($comment);
			$this->chapter($chapterId); //Actualisation de l'affichage du chapitre
		}	 
	}

	public function reportComments($id, $chapterId)
	{
		$this->_commentManager->reportComment($id);
		$this->chapter($chapterId); 
	}

	public function home()
	{
		$view = new View('home');
		$view->generate(array('home'));
	}

}



