<?php

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
                    if (isset($_GET['p']))
                    {
                        if ($_GET['p'] > 0)
                        {
                            $this->_frontendController->listChapters();
                        }
                        else 
                        {
                            $this->_frontendController->pagelistChaptersNotFound();
                        }
                    } 
                    else
                    {
                        $this->_frontendController->listChapters();
                    } 
                }
                else if ($_GET['action'] == 'listLastChapters') 
                {
                    $this->_frontendController->listLastChapters();
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
                        $this->_frontendController->chapterNotFound();
                       /*throw new Exception("Identifiant de chapitre non valide ou non défini");*/
                    }
                }    
                  else if ($_GET['action'] == 'addComment') 
                {
                    $this->_frontendController->addComment();
                }   
                else if ($_GET['action'] == 'reportComments') 
                {
                    $this->_frontendController->reportComments();
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
                    else if (isset($_SESSION['login']) AND !empty($_SESSION['login']) AND isset($_SESSION['password']) AND !empty($_SESSION['password']))
                    {
                    	$login = $_SESSION['login'];
                        $password = $_SESSION['password'];
                        $this->_connectionController->adminAccess($login, $password);
                    }
                    else 
                    {
                        $this->_connectionController->connectionAccess();
                    }
                }   
                else if ($_GET['action'] == 'writeChapter') 
                {
                    if (isset($_SESSION['login']) AND !empty($_SESSION['login']) AND isset($_SESSION['password']) AND !empty($_SESSION['password']))
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
                    else 
                    {
                        echo 'Vous devez être connecté pour pouvoir accéder à cette page !';
                        $this->_connectionController->connectionAccess();
                    }
                } 
                else if ($_GET['action'] == 'saveChapter') 
                {
                    $this->_backendController->saveChapter();
                }   
                else if ($_GET['action'] == 'publishChapter')
                {
                    $this->_backendController->publishChapter();
                }
                else if ($_GET['action'] == 'deleteChapter') 
                {
                    $this->_backendController->deleteChapter();
                }
                else if ($_GET['action'] == 'ignoreReportedComment') 
                {
                    $this->_backendController->ignoreReportedComment();
                }
                else if ($_GET['action'] == 'deleteComment') 
                {
                    $this->_backendController->deleteComment();
                }
                else if ($_GET['action'] == 'updatePassword') 
                {
                    $this->_connectionController->updatePassword();
                }
                else 
                {
                    $this->_frontendController->pageNotFound();
                    /*throw new Exception("Action non valide");*/
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