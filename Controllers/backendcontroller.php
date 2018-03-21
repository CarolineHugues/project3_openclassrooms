<?php

require_once 'Models/chaptermanager.php';
require_once 'Models/commentmanager.php';
require_once 'Models/pdofactory.php';
require_once 'Views/Backend/backendview.php';


class BackendController 
{

	private $_chapterManager,
			$_commentManager;

  	public function __construct() 
  	{
    	$this->_chapterManager = new ChapterManager (PDOFactory::getMysqlConnexion());
    	$this->_commentManager = new CommentManager (PDOFactory::getMysqlConnexion());
  	}

  	public function writeChapter() 
  	{
  		$view = new BackendView('addChapter');
    	$view->generate(array('addChapter'));
  	}

  	public function addChapter($chapter)
  	{
  		if (empty($_POST['title']))
       	{
            echo 'Vous devez renseigner un titre !';
        }
       	else if (empty($_POST['content']))
        {
            echo 'Vous devez renseigner le contenu du chapitre !';
        }
        else if (empty($_POST['excerpt']))
        {
            echo 'Vous devez renseigner le résumé du chapitre !';
        }
        else 
        {
			$this->_chapterManager->add($chapter);
			$view = new BackendView('admin');
    		$view->generate(array('admin'));
		}
  	}
}