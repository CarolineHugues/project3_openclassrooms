<?php $this->title = 'Espace d\'administration du site de Jean Forteroche'; ?>

<a href="?action=writeChapter"><button id="buttonAddChapter">+</button></a>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Les chapitres</h3>

	<section id="chaptersLists">
		<div>
			<?php if ($nbPublishedChapters < 2)
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbPublishedChapters ?> chapitre publié :</h4>
			<?php
			}
			else
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbPublishedChapters ?> chapitres publiés :</h4>
			<?php
			}
			?>
			<?php foreach ($chapters as $chapter) 
			{
			?>
				<ul>
					<li>
						<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><h5 class="chaptersTitles"><?= $chapter->title ?></h5></a>
						<p class="datesChaptersLists">Publié le <?= $chapter->publishedDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?> </p>
						<div class="buttonsChaptersLists">
							<form action="?action=writeChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Modifier" name="modify" class="buttonAdmin" />
							</form>
							<form action="?action=deleteChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" class="buttonAdmin" />
							</form>
						</div>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
		
		<div>
			<?php if ($nbDraftsChapters < 2)
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbDraftsChapters ?> chapitre enregistré en brouillon :</h4>
			<?php
			}
			else
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbDraftsChapters ?> chapitres enregistrés en brouillon :</h4>
			<?php
			}
			?>
			<?php foreach ($draftsChapters as $chapter) 
			{
			?>
				<ul>
					<li>
						<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><h5 class="chaptersTitles"><?= $chapter->title ?></h5></a>
						<p class="datesChaptersLists">Ajouté le <?= $chapter->addDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?></p>
						<div class="buttonsChaptersLists">
							<form action="?action=writeChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Modifier" name="modify" class="buttonAdmin" />
							</form>
							<form action="?action=publishChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Publier" name="publish" class="buttonAdmin" />
							</form>
							<form action="?action=deleteChapter" method="post">
								<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" class="buttonAdmin" />
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
			<?php if ($nbReportedComments < 2)
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbReportedComments ?> commentaire signalé :</h4>
			<?php
			}
			else
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbReportedComments ?> commentaires signalés :</h4>
			<?php
			}
			?>
			<?php foreach ($reportedComments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= $comment->author ?> | Adresse mail : <?= $comment->authorMail ?></h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p class="commentsContent"><?= $comment->content ?></p>
						<a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><p class="commentsChapter">Voir le chapitre correspondant</p></a>
						<div class="buttonsCommentsLists">
							<form action="?action=deleteComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" class="buttonAdmin" />
							</form>
							<form action="?action=ignoreReportedComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Ignorer" name="ignore" class="buttonAdmin" />
							</form>
						</div>
					</li>
				</ul>
			<?php 		
			} ?>
		</div>
		
		<div>
			<?php if ($nbPublishedComments < 2)
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbPublishedComments ?> commentaire publié :</h4>
			<?php
			}
			else
			{
			?>
				<h4 class="subTitlesLists"> <?= $nbPublishedComments ?> commentaires publiés :</h4>
			<?php
			}
			?>
			<?php foreach ($comments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= $comment->author ?> | Adresse mail : <?= $comment->authorMail ?></h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p class="commentsContent"><?= $comment->content ?></p>
						<a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><p class="commentsChapter">Voir le chapitre correspondant</p></a>
							<form action="?action=deleteComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
								<input type="submit" value="Supprimer" name="delete" class="buttonAdmin" />
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