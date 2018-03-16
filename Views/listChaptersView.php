<?php $title = 'Les chapitres - Billet simple pour l\'alaska'; 

ob_start(); ?>

	<section class="posts">
		<?php foreach ($chapters as $chapter)
		{ 
		?>
			<article>
<<<<<<< HEAD
 				<h2><a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><?= $chapter->title ?></a></h2>
  				<p><?= nl2br($chapter->excerpt) ?></p>
=======
				<h2><a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><?= $chapter->id() ?></a></h2>
 				<h2><a href="chapitre-<?= $chapter->id() ?>.<?php  ?>"><?= $chapter->title() ?></a></h2>
  				<p><?= ($chapter->author()) ?></p>
  				<p><?= ($chapter->excerpt()) ?></p>
>>>>>>> 778e927d816dc640271d8ca4c8748156f200111e
			</article>
		<?php
		}
		?>
	</section> 

<?php $content = ob_get_clean(); 

require('template.php'); ?>
