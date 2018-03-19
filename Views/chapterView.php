<?php $this->_title = $chapter->title . ' - Billet simple pour l\'alaska'; ?>

<?php $this->_currentNav = 'chapter'; ?>

	<section class="post">
		<header class="major">
			<span class="date"><?= $chapter->publishedDate_fr ?></span>
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
			<p><?= $comment->publishedDate_fr ?></p>
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
		<form class="alt" method="post" action="?action=addComment">
			<div class="row uniform">
			<div class="6u 12u$(xsmall)">
				<label for="author">Nom</label>
				<input id="name" name="author" type="text" />
			</div>
			<div class="6u 12u$(xsmall)">
				<label for="authorMail">Mail</label>
				<input id="mail" name="authorMail" type="text" />
			</div>
			<div class="12u$">
				<label for="content">Commentaire</label>
				<textarea id="comment" name="content" rows="3" /></textarea>
			</div>
			<input type="hidden" name="chapterid" value="<?= $chapter->id() ?>" />
			<div class="12u$">
			<ul class ="actions">
				<li>
					<input class="special" value="Laisser un commentaire" type="submit" />
				</li>
			</ul>
		</div>
		</div>
		</form>	
	</section>	