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
                else if ($_POST['action'] == 'addComment') 
                {
                    $this->_frontendController->addComment();
                }   
                else if ($_GET['action'] == 'reportComment') 
                {
                    $this->_frontendController->reportComment();
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