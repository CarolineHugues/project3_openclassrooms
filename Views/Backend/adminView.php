<?php $this->title = 'Espace d\'administration du site de Jean Forteroche'; ?>

<a href="?action=writeChapter"><button id="buttonAddChapter">+</button></a>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Les chapitres</h3>

	<section id="chaptersLists">
		<div>
			<?php if ($nbPublishedChapters < 2)
			{
			?>
				<h4> <?= $nbPublishedChapters ?> chapitre publié :</h4>
			<?php
			}
			else
			{
			?>
				<h4> <?= $nbPublishedChapters ?> chapitres publiés :</h4>
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
							<form action="?action=chapter&id=<?= $chapter->id() ?>" method="post">
								<input type="submit" value="Afficher" name="show" class="buttonAdmin" />
							</form>
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
				<h4> <?= $nbDraftsChapters ?> chapitre enregistré en brouillon :</h4>
			<?php
			}
			else
			{
			?>
				<h4> <?= $nbDraftsChapters ?> chapitres enregistrés en brouillon :</h4>
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
							<form action="?action=chapter&id=<?= $chapter->id() ?>" method="post">
								<input type="submit" value="Apperçu" name="preview" class="buttonAdmin" />
							</form>
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
				<h4> <?= $nbReportedComments ?> commentaire signalé :</h4>
			<?php
			}
			else
			{
			?>
				<h4> <?= $nbReportedComments ?> commentaires signalés :</h4>
			<?php
			}
			?>
			<?php foreach ($reportedComments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= htmlspecialchars($comment->author) ?> | Adresse mail : <?= htmlspecialchars($comment->authorMail) ?></h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p class="commentsContent"><?= htmlspecialchars(nl2br($comment->content)) ?></p>
						<div class="buttonsCommentsLists">
							<form action="?action=chapter&id=<?= $comment->chapterId ?>" method="post">
								<input type="submit" value="Afficher" name="show" class="buttonAdmin" />
							</form>
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
				<h4 id="titlePublishedCommentsList"> <?= $nbPublishedComments ?> commentaire publié :</h4>
			<?php
			}
			else
			{
			?>
				<h4 id="titlePublishedCommentsList"> <?= $nbPublishedComments ?> commentaires publiés :</h4>
			<?php
			}
			?>
			<?php foreach ($comments as $comment) 
			{
			?>
				<ul>
					<li>
						<h5>Par <?= htmlspecialchars($comment->author) ?> | Adresse mail : <?= htmlspecialchars($comment->authorMail) ?> </h5>
						<p class="dateCommentsLists">Le <?= $comment->publishedDate_fr ?></p>
						<p class="commentsContent"><?= htmlspecialchars(nl2br($comment->content)) ?></p>
						<div class="buttonsCommentsLists">
							<form action="?action=chapter&id=<?= $comment->chapterId ?>" method="post">
								<input type="submit" value="Afficher" name="show" class="buttonAdmin" />
							</form>
							<form action="?action=deleteComment" method="post">
								<input type="hidden" name="id" value="<?= $comment->id() ?>" />
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
	<h3 class="titleAdmin">Login et mot de passe</h3>
	<section id="updatePasswordSpace">
		<div id="showLogin">
			<h4>Login :</h4>
			<p><?= $getLogin ?></p>	
		</div>
		<h4>Changer de mot de passe :</h4>
		<form action="?action=updatePassword" method="post">
			<!--<input type="password" name="oldpassword" placeholder="Renseigner votre ancien mot de passe."/><br />-->
			<input type="password" name="password" placeholder="Renseigner votre nouveau mot de passe" class="passwordField" /><br />
			<input type="password" name="newpassword" placeholder="Renseigner à nouveau votre nouveau mot de passe" class="passwordField"/><br />
			<input type="hidden" name="login" value="<?= $getLogin ?>" />
			<input type="submit" value="Modifier" name="updatePassword" class="buttonAdmin" />
		</form>
	</section>
</section>