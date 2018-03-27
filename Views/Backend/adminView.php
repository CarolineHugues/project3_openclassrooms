<?php $this->title = 'Espace d\'administration du site de Jean Forteroche'; ?>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Les chapitres</h3>
	<a href="?action=writeChapter"><button>+</button></a>

	<section id="chaptersLists">
		<div>
			<h4> <?= $nbPublishedChapters ?> chapitres publiés :</h4>
			<?php foreach ($chapters as $chapter) 
			{
			?>
				<ul>
					<li>
						<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><h5><?= $chapter->title ?></h5></a>
						<p class="datesChaptersLists">Publié le <?= $chapter->publishedDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?> </p>
						<div class="buttonsChaptersLists">
							<form action="?action=writeChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Modifier" name="modify" />
							</form>
							<form action="?action=deleteChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" />
							</form>
						</div>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
		
		<div>
			<h4> <?= $nbDraftsChapters ?> chapitres enregistrés en brouillon :</h4>
			<?php foreach ($draftsChapters as $chapter) 
			{
			?>
				<ul>
					<li>
						<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><h5><?= $chapter->title ?></h5></a>
						<p class="datesChaptersLists">Ajouté le <?= $chapter->addDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?></p>
						<div class="buttonsChaptersLists">
							<form action="?action=writeChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Modifier" name="modify" />
							</form>
							<form action="?action=publishChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Publier" name="publish" />
							</form>
							<form action="?action=deleteChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" />
							</form>
						</div>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
	</section>
</section>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Les commentaires</h3>

	<section id="commentsLists">
		<div>
			<h4> <?= $nbReportedComments ?> commentaires signalés :</h4>
			<?php foreach ($reportedComments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= $comment->author ?> | Adresse mail : <?= $comment->authorMail ?></h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p><?= $comment->content ?></p>
						<a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><p>Voir le chapitre correspondant</p></a>
						<div class="buttonsCommentsLists">
							<form action="?action=deleteComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" />
							</form>
							<form action="?action=ignoreReportedComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Ignorer" name="ignore" />
							</form>
						</div>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
		
		<div>
			<h4> <?= $nbPublishedComments ?> commentaires publiés :</h4>
			<?php foreach ($comments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= $comment->author ?> | Adresse mail : <?= $comment->authorMail ?></h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p><?= $comment->content ?></p>
						<a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><p>Voir le chapitre correspondant</p></a>
							<form action="?action=deleteComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" />
							</form>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
	</section>
</section>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Login et mot de passe</h3>
</section>