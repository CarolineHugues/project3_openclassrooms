<?php
require_once 'Controllers/frontendcontroller.php';

class Router 
{
    private $_frontendController;
    private $_error;

    public function error()
    {
        return $this->_error;
    }

    public function __construct() 
    {
        $this->_frontendController = new FrontendController ();
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
                        $comment = new Comment(['author' => htmlspecialchars($_POST['author']), 'authorMail' => htmlspecialchars($_POST['authorMail']), 'content' => htmlspecialchars($_POST['content']), 'chapterId' => $_POST['chapterid']]);
                        $chapterId = intval($_POST['chapterid']);
                        $this->_frontendController->addComment($comment, $chapterId);
                    }
                }   
                else if ($_GET['action'] == 'reportComments') 
                {
                    $chapterId = intval($_POST['chapterid']);
                    $id = intval($_POST['id']);
                    $this->_frontendController->reportComments($id, $chapterId);
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