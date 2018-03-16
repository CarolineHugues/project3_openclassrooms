<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" /> 
        <link href="public/massively-master/massively-master/assets/css/main.css" rel="stylesheet" /> 
    </head>

    <body>
    	<header id ="header">
    		<h1><a class="logo" href="index.php">Billet simple pour l'Alaska</a></h1>
      </header>

      <nav id="nav">
        <ul class="links">
          <li>
            <a href="index.php">Présentation</a>
          </li>
          <li>
            <a href="index.php?action=listChapters">Les chapitres</a>
          </li>
          <li>
            <a href="">Chapitre ...</a>
          </li>
        </ul>
      </nav>

    	<div id="main">
       	<?= $content ?>
      </div> 	

    	<footer></footer>
      <div id="copyright">
        © 2018
      </div>    
    </body>
</html>