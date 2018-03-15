<?php $title = $chapter->title() . '- Billet simple pour l\'alaska';

ob_start(); ?>

	<section class="post">
		<header class="major">
			<span class="date"><?= $chapter->publishedDate()->format('d m Y à H i') ?></span>
			<h2><?= $chapter->id() ?></h2>
			<p>Par <?= $chapter->author() ?></p>
		</header> 

		<p><?= ($chapter->content()) ?></p>
	
	</section>

<?php $content = ob_get_clean(); 

require('template.php'); ?>




