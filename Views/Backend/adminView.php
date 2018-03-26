<?php $this->title = 'Espace d\'administration du site de Jean Forteroche'; ?>

<section class="sectionAdmin">
	<h3>Les chapitres</h3>
	<p><a href="?action=writeChapter">+</a></p>

	<p> <?= $nbPublishedChapters ?> chapitres publiés :</p>
	<?php foreach ($chapters as $chapter) 
	{
	?>
		<ul>
			<li>
				<p>Publié le <?= $chapter->publishedDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?> </p>
				<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><p><?= $chapter->title ?></p></a>
				<br />
				<form action="?action=writeChapter" method="post">
					<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
					<input type="submit" value="Modifier" name="modify" />
				</form>
				<form action="?action=deleteChapter" method="post">
					<input type="hidden" name="id" value="<?= $chapter->id() ?>" />
					<input type="submit" value="Supprimer" name="delete" />
				</form>
			</li>
		</ul>
	<?php 		
	} ?>

	<p> <?= $nbDraftsChapters ?> chapitres enregistrés en brouillon :</p>
	<?php foreach ($draftsChapters as $chapter) 
	{
	?>
		<ul>
			<li>
				<p>Ajouté le <?= $chapter->addDate_fr ?> | Dernière modification le <?= $chapter->updateDate_fr ?></p>
				<a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><p><?= $chapter->title ?></p></a>
				<br />
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
			</li>
		</ul>
	<?php 		
	} ?>
</section>
<section class="sectionAdmin">
	<h3>Les commentaires</h3>
</section>
<section class="sectionAdmin">
	<h3>Login et mot de passe</h3>
</section>