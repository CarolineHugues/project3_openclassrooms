<?php

class FrontendController {

	private $_chapterManager,
			$_commentManager,
			$_navigation;

  	public function __construct() 
  	{
    	$this->_chapterManager = new ChapterManager (PDOFactory::getMysqlConnexion());
    	$this->_commentManager = new CommentManager (PDOFactory::getMysqlConnexion());
    	$this->_navigation = new Navigation ();
  	}

	public function listChapters()
	{
		$chaptersPerPage = 4;
		$totalChapters = $this->_chapterManager->countPublished();
		$nbListChaptersPages = $this->_navigation->CountNbPages($totalChapters, $chaptersPerPage);
		$curentChaptersPage = $this->_navigation->getCurrentPage($totalChapters, $chaptersPerPage);
		$firstEntrance = $this->_navigation->getFirstEntrance($curentChaptersPage, $chaptersPerPage);

		$nextPage = $this->_navigation->getNextPage();
		$previousPage = $this->_navigation->getPreviousPage();

    	$chapters = $this->_chapterManager->getPublishedListAsc($firstEntrance, $chaptersPerPage);
    	$view = new FrontendView('listChapters');
    	$view->generate(array('chapters' => $chapters, 'nbListChaptersPages' => $nbListChaptersPages, 'nextPage' => $nextPage, 'previousPage' => $previousPage));
	}

	public function listLastChapters()
	{
		$chaptersPerPage = 3;
		$totalChapters = $this->_chapterManager->countPublished();
		$nbListChaptersPages = $this->_navigation->CountNbPages($totalChapters, $chaptersPerPage);
		$curentChaptersPage = $this->_navigation->getCurrentPage($totalChapters, $chaptersPerPage);
		$firstEntrance = $this->_navigation->getFirstEntrance($curentChaptersPage, $chaptersPerPage);

    	$chapters = $this->_chapterManager->getPublishedList($firstEntrance, $chaptersPerPage);
    	$view = new FrontendView('listLastChapters');
    	$view->generate(array('chapters' => $chapters));
	}

	public function chapter($id)
	{
		$chapter = $this->_chapterManager->getUnique($id);

		$comments = $this->_commentManager->getListOf($chapter->id());

    	$view = new FrontendView('chapter');
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
		$view = new FrontendView('home');
		$view->generate(array('home'));
	}

}



