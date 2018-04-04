<?php $this->currentNav = 'lastChapters'; ?>

<?php $this->title = 'Les derniers chapitres - Billet simple pour l\'alaska'; ?>

	<section class="posts">
		<?php foreach ($chapters as $chapter)
		{ 
		?>
			<article>
 				<h2><a href="index.php?action=chapter&id=<?= $chapter->id() ?>"><?= $chapter->title ?></a></h2>
 				<a class="image fit" href="index.php?action=chapter&id=<?= $chapter->id() ?>">
					<img src="Public/images/cross-country-skiers-1591117_1280.jpg" alt="Photo de présentation du chapitre" /> 
				</a>
  				<p><?= nl2br($chapter->excerpt) ?></p>
  				<ul class="actions">
  					<li>
  						<a class="button" href="index.php?action=chapter&id=<?= $chapter->id() ?>">Lire le chapitre</a>
  					</li>
  				</ul>
			</article>
		<?php
		}
		?>
		<article id="buttonReadBeginningSpace">
			<p id="buttonReadBeginning">
				<a class="button special" href="?action=listChapters">Lire l'histoire depuis le début</a>
			</p>
		</article>
	</section> 