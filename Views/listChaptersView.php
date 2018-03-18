<?php $this->_currentNav = 'chapters'; ?>

<?php $this->_title = 'Les chapitres - Billet simple pour l\'alaska'; ?>

	<section class="posts">
		<?php foreach ($chapters as $chapter)
		{ 
		?>
			<article>
 				<h2><a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><?= $chapter->title ?></a></h2>
  				<p><?= nl2br($chapter->excerpt) ?></p>
			</article>
		<?php
		}
		?>
	</section> 
