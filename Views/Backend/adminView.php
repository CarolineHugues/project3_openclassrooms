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
			}
			?>
			<div>
				<?php
				if ($nbPublishedChaptersListPages > 1)
				{
				?>
					<ul class="navigationSpaceButtons">
						<?php for ($i = 1; $i <= $nbPublishedChaptersListPages; $i++)
						{
						?>
							<li class="navigationButtons">
   								<?php echo "<a href='?action=adminAccess&p=$i'> $i </a>"; ?>
   							</li>
   						<?php
    					}
    					?>
    				</ul>
    			<?php	 
    			}	
				?>
			</div>
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
								<input type="submit" value="Aperçu" name="preview" class="buttonAdmin" />
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
			} 
			?>
			<div>
				<?php
				if ($nbDraftsChaptersListPages > 1)
				{
				?>
					<ul class="navigationSpaceButtons">
						<?php for ($i = 1; $i <= $nbDraftsChaptersListPages; $i++)
						{
						?>
							<li class="navigationButtons">
   								<?php echo "<a href='?action=adminAccess&p=$i'> $i </a> ";?>
   							</li>
   						<?php 
    					}
    					?>
    				</ul>
    			<?php
    			}	 
				?>	
			</div>
		</div>
	</section>
</section>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Les commentaires</h3>

	<section id="commentsLists">
		<div id="reportedcommentslist">
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
						<h5>Par <?= htmlspecialchars($comment->author) ?> | Adresse mail : <?= htmlspecialchars($comment->authorMail) ?> | <a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><?= $comment->title ?></a></h5>
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
			} 
			?>
			<div>
				<?php
				if ($nbReportedCommentsListPages > 1)
				{
				?>
					<ul class="navigationSpaceButtons">
						<?php for ($i = 1; $i <= $nbReportedCommentsListPages; $i++)
						{
						?>
							<li class="navigationButtons">
   								<?php echo "<a href='?action=adminAccess&p=$i#reportedcommentslist'> $i </a>";?>
   							</li>
   						<?php 
    					}
    					?>
    				</ul>
    			<?php
    			}	 
				?>	
			</div>
		</div>
		
		<div id="publishedcommentslist">
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
						<h5>Par <?= htmlspecialchars($comment->author) ?> | Adresse mail : <?= htmlspecialchars($comment->authorMail) ?> | <a href="index.php?action=chapter&id=<?= $comment->chapterId ?>"><?= $comment->title ?></a></h5>
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
			} 
			?>
			<div class="navigationSpace">
				<?php
				if ($nbPublishedCommentsListPages > 1)
				{
				?>
					<ul class="navigationSpaceButtons">
						<?php for ($i = 1; $i <= $nbPublishedCommentsListPages; $i++)
						{
						?>
							<li class="navigationButtons">
   								<?php echo "<a href='?action=adminAccess&p=$i#publishedcommentslist'> $i </a>"; ?>
   							</li>
   						<?php 
    					}
    					?>
    				</ul>
    			<?php
    			}	 
				?>	
			</div>
		</div>
	</section>
</section>

<section class="sectionAdmin">
	<h3 class="titleAdmin">Mot de passe</h3>
	<section id="updatePasswordSpace">
		<h4>Changer de mot de passe :</h4>
		<form action="?action=updatePassword" method="post">
			<input type="password" name="password" placeholder="Renseigner votre nouveau mot de passe" class="passwordField" /><br />
			<input type="password" name="newpassword" placeholder="Renseigner à nouveau votre nouveau mot de passe" class="passwordField"/><br />
			<input type="hidden" name="login" value="<?= $getLogin ?>" />
			<input type="submit" value="Modifier" name="updatePassword" class="buttonAdmin" />
		</form>
	</section>
</section>