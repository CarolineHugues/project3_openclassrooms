<?php $title = $chapter->title . '- Billet simple pour l\'alaska';

ob_start(); ?>

	<section class="post">
		<header class="major">
			<span class="date"><?= $chapter->publishedDate/*->format('d m Y à H i')*/ ?></span>
			<h2><?= $chapter->title ?></h2>
			<p>Par <?= $chapter->author ?></p>
		</header> 

		<p><?= nl2br($chapter->content) ?></p>
	
	</section>

	<section>
		<?php if (empty($comments)) 
		{
		?>
			<h3>Soyez le premier à commenter !</h3>
		<?php
		}
		?>

		<?php foreach ($comments as $comment)
		{ 
		?>
			<p><?= $comment->author ?></p>
			<p><?= $comment->publishedDate ?></p>
			<p><?= $comment->content ?></p>	
		<?php			
		}
		?>
	</section>

	<section>
		<form method="post" action="#">
			<div class="field">
				<label for="author">Nom</label>
				<input id="name" name="author" type="text">
			</div>
			<div class="field">
				<label for="authorMail">Mail</label>
				<input id="mail" name="authorMail" type="text">
			</div>
			<div class="field">
				<label for="content">Commentaire</label>
				<textarea id="comment" name="content" rows="3"></textarea>
			</div>
			<ul class ="actions">
				<li>
					<input value="Laisser un commentaire" type="submit">
				</li>
			</ul>
		</form>	
	</section>	

<?php $content = ob_get_clean(); 

require('template.php'); ?>




