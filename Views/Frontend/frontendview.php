<?php 
require_once 'Views/view.php';

class FrontendView extends View {

  protected $currentNav;

  public function __construct($action) 
  {
    $this->file = "Views/Frontend/" . $action . "View.php";
  }

  public function generate($data) 
  {
    $content = $this->generateFile($this->file, $data);
    $view = $this->generateFile('Views/Frontend/template.php', array('title' => $this->title, 'currentNav' => $this->currentNav,  'content' => $content));
    
    echo $view;
  }
}