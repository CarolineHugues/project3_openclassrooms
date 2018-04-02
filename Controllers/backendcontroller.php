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
    $view = new BackendView('writeChapter');
    $view->generate(array('writeChapter'));
  }

 	public function updateChapter($id) 
 	{
    $chapter = $this->_chapterManager->getUnique($id);
    $view = new BackendView('writeChapter');
    $view->generate(array('writeChapter', 'chapter' => $chapter));
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
      if (isset($_POST['publishedDate']) AND $_POST['publishedDate'] == 'new')
      {
        $this->_chapterManager->updatePublishedDate($chapter);
        $this->_chapterManager->save($chapter);
      }
      else
      {
        $this->_chapterManager->save($chapter);
      }
      $view = new BackendView('saveChapter');
      $view->generate(array('saveChapter', 'chapter' => $chapter));
		}
  }

  public function publishChapter($id)
  {
    $this->_chapterManager->publish($id);
    $view = new BackendView('publishChapter');
    $view->generate(array('publishChapter'));
  }

  public function deleteChapter($id)
  {
    $this->_chapterManager->delete($id);
    $view = new BackendView('deleteChapter');
    $view->generate(array('deleteChapter'));
  }

  public function ignoreReportedComment($id)
  {
    $this->_commentManager->ignoreReportedComment($id);
    $view = new BackendView('ignoreReportedComment');
    $view->generate(array('ignoreReportedComment'));
  }

  public function deleteComment($id)
  {
    $this->_commentManager->delete($id);
    $view = new BackendView('deleteComment');
    $view->generate(array('deleteComment'));
  }
}