<?php 

class View {

  private $_file,
          $_title,
          $_currentNav;

  public function __construct($action) 
  {
    $this->_file = "Views/Frontend/" . $action . "View.php";
  }

  public function generate($data) 
  {
    $content = $this->generateFile($this->_file, $data);
    $view = $this->generateFile('Views/Frontend/template.php', array('title' => $this->_title, 'currentNav' => $this->_currentNav,  'content' => $content));
    
    echo $view;
  }

  private function generateFile($file, $data) 
  {
    if (file_exists($file)) 
    {
      extract($data);

      ob_start();

      require $file;

      return ob_get_clean();
    }
    else 
    {
      throw new Exception("Fichier '$file' introuvable");
    }
  }
}