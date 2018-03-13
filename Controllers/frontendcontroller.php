<?php

require_once 'Models/chaptermanager.php';
require_once 'Models/commentmanager.php';
require_once 'Views/view.php';

class FrontendController {

	private $_chapterManager,
			$_commentManager;

  	public function __construct() 
  	{
    	$this->_chapterManager = new ChapterManager ();
    	$this->_commentManager = new CommentManager ();
  	}

	public function listChapters()
	{
    	$chapters = $this->_chapterManager->getPublishedList(0,3);
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

	public function addComment(Comment $comment, $idChapter)
	{
		$this->_commentManager->add(Comment $comment);
		$this->chapter($idChapter); //Actualisation de l'affichage du chapitre 
	}

	public function reportComment($idChapter)
	{
		$this->_commentManager->reportComment();
		$this->chapter($idChapter); 
	}

}



