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

  public function addChapter()
  {    
    $view = new BackendView('saveChapter');
    $view->generate(array('saveChapter'));
  }

 	public function updateChapter($id) 
 	{
    $chapter = $this->_chapterManager->getUnique($id);
    $view = new BackendView('saveChapter');
    $view->generate(array('saveChapter', 'chapter' => $chapter));
  }

  public function saveChapter($chapter)
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
      $this->_chapterManager->save($chapter);
		}
  }

  public function publishChapter($id)
  {
    $this->_chapterManager->publish($id);
  }

  public function deleteChapter($id)
  {
    $this->_chapterManager->delete($id);
  }
}