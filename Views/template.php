<!DOCTYPE html>

<html>

    <head>
        <title><?= $title ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="public/style.css" rel="stylesheet" /> 
        <link href="public/massively-master/massively-master/assets/css/main.css" rel="stylesheet" /> 
    </head>
    <noscript>
      <link rel="stylesheet" type="text/css" href="public/massively-master/massively-master/assets/css/noscript.css">
    </noscript>

    <body>
      <div id="wrapper">
    	  <header id ="header">
    		  <h1><a class="logo" href="index.php">Billet simple pour l'Alaska</a></h1>
        </header>

        <nav id="nav">
          <ul class="links">
            <li<?php if ($currentNav == 'home') {echo ' class="active"';} ?>>
              <a href="index.php">Présentation</a>
            </li>
            <li <?php if ($currentNav == 'chapters') {echo ' class="active"';} ?>>
              <a href="index.php?action=listChapters">Les chapitres</a>
            </li>
            <li <?php if ($currentNav == 'chapter') {echo ' class="active"';} ?>>
              <p><?php if ($currentNav == 'chapter') {echo 'Lecture en cours';} ?></p>
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
        <a id="navPanelToggle" class="alt" href="#navPanel">Menu</a>
      </div>   
      <script src="public/massively-master/massively-master/assets/js/jquery.min.js"></script>
      <script src="public/massively-master/massively-master/assets/js/jquery.scrollex.min.js"></script>
      <script src="public/massively-master/massively-master/assets/js/jquery.scrolly.min.js"></script>
      <script src="public/massively-master/massively-master/assets/js/skel.min.js"></script>
      <script src="public/massively-master/massively-master/assets/js/util.js"></script>
      <script src="public/massively-master/massively-master/assets/js/main.js"></script>
      <div id="navPanel">
        <nav></nav>
        <a clas="close" href="#navPanel"></a>
      </div>
    </body>
</html>