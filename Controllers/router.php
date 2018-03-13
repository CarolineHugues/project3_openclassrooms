<?php
require_once 'Controllers/frontendcontroller.php';

class Router 
{
    private $_frontendController;

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
                if ($_GET['action'] == 'chapter') 
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
                else 
                {
                    throw new Exception("Action non valide");    
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
                $this->_frontendController->listChapters();
            }
        catch (Exception $e) 
        {
            $this->error($e->getMessage());
        }
    }
}