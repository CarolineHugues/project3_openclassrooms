<?php $this->_title = $chapter->title . ' - Billet simple pour l\'alaska'; ?>

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
			<p><?= htmlspecialchars($comment->author) ?></p>
			<p><?= $comment->publishedDate ?></p>
			<p><?= htmlspecialchars(nl2br($comment->content)) ?></p>
			<p><?= $comment->status ?></p>
			<form method="post" action="?action=reportComments">
				<input type="hidden" name="id" value="<?= $comment->id() ?>" />
				<input type="hidden" name="chapterid" value="<?= $comment->chapterId ?>" />
				<input value="Signaler ce commentaire" type="submit">
			</form>
		<?php			
		}
		?>
	</section>

	<section>
		<h2>Laisser un commentaire</h2>
		<form method="post" action="?action=addComment">
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
			<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
			<ul class ="actions">
				<li>
					<input value="Laisser un commentaire" type="submit">
				</li>
			</ul>
		</form>	
	</section>	






