<?php 

class BackendView extends View {

  public function __construct($action) 
  {
    $this->file = "Views/Backend/" . $action . "View.php";
  }

  public function generate($data) 
  {
    $content = $this->generateFile($this->file, $data);
    $view = $this->generateFile('Views/Backend/template.php', array('title' => $this->title, 'content' => $content));
    
    echo $view;
  }
}