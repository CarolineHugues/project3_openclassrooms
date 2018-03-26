<?php 

class View {

  protected $file,
            $title;

  protected function generateFile($file, $data) 
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