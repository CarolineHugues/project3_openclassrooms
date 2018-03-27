<?php
require_once 'Controllers/frontendcontroller.php';
require_once 'Controllers/connectioncontroller.php';
require_once 'Controllers/backendcontroller.php';


class Router 
{
    private $_frontendController,
            $_connectionController,
            $_backendController,
            $_error;

    public function error()
    {
        return $this->_error;
    }

    public function __construct() 
    {
        $this->_frontendController = new FrontendController ();
        $this->_connectionController = new ConnectionController ();
        $this->_backendController = new BackendController ();
    }

    public function routerRequest() 
    {
        try
        {
            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'listChapters') 
                {
                    $this->_frontendController->listChapters();
                }  
                else if ($_GET['action'] == 'chapter') 
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0) 
                    {
                        $id = intval($_GET['id']);
                        $this->_frontendController->chapter($id);
                    }
                    else
                    {
                       throw new Exception("Identifiant de chapitre non valide ou non défini"); 
                    }
                }    
                  else if ($_GET['action'] == 'addComment') 
                {
                    $comment = new Comment(['author' => $_POST['author'], 'authorMail' => $_POST['authorMail'], 'content' => $_POST['content'], 'chapterId' => $_POST['chapterid']]);
                    $chapterId = intval($_POST['chapterid']);
                    $this->_frontendController->addComment($comment, $chapterId);
                }   
                else if ($_GET['action'] == 'reportComments') 
                {
                    $chapterId = intval($_POST['chapterid']);
                    $id = intval($_POST['id']);
                    $this->_frontendController->reportComments($id, $chapterId);
                }   
                else if ($_GET['action'] == 'connectionAccess') 
                {
                    $this->_connectionController->connectionAccess();
                }  
                else if ($_GET['action'] == 'adminAccess') 
                {
                    if (isset($_POST['login']) AND isset($_POST['password']))
                    {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $this->_connectionController->adminAccess($login, $password);
                    }
                    else 
                    {
                        $this->_connectionController->connectionAccess();
                    }
                }   
                else if ($_GET['action'] == 'writeChapter') 
                {
                    if (isset($_POST['id']))
                    {
                        $id = $_POST['id'];
                        $this->_backendController->updateChapter($id);
                    }
                    else
                    {
                        $this->_backendController->addChapter();
                    }
                } 
                else if ($_GET['action'] == 'saveChapter') 
                {
                    if (isset($_POST['id']))
                    {
                       $chapter = new Chapter(['id' => $_POST['id'],'title' => $_POST['title'], 'content' => $_POST['content'], 'excerpt' => $_POST['excerpt'], 'status' => $_POST['status']]);
                    }
                    else 
                    {
                        $chapter = new Chapter(['title' => $_POST['title'], 'content' => $_POST['content'], 'excerpt' => $_POST['excerpt']]);  
                    }
                    $this->_backendController->saveChapter($chapter);
                }   
                else if ($_GET['action'] == 'publishChapter')
                {
                    $id = $_POST['id'];
                    $this->_backendController->publishChapter($id);
                }
                else if ($_GET['action'] == 'deleteChapter') 
                {
                    $id = $_POST['id'];
                    $this->_backendController->deleteChapter($id);
                }
                else if ($_GET['action'] == 'ignoreReportedComment') 
                {
                    $id = $_POST['id'];
                    $this->_backendController->ignoreReportedComment($id);
                }
                else if ($_GET['action'] == 'deleteComment') 
                {
                    $id = $_POST['id'];
                    $this->_backendController->deleteComment($id);
                }
                else 
                {
                    throw new Exception("Action non valide");    
                }
            }           
			else 
            {
                $this->_frontendController->home();
            }
        }
        catch (Exception $e) 
        {
            $this->error($e->getMessage());
            echo $e;
        }
    }
}