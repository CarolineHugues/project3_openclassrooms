<?php $this->currentNav = 'chapters'; ?>

<?php $this->title = 'Les chapitres - Billet simple pour l\'alaska'; ?>

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
		<div id="chaptersNavigationSpace">
			<ul id="chaptersNavigation" class="actions">
				<?php
				if ($nbListChaptersPages > 1)
				{
					for ($i = 1; $i <= $nbListChaptersPages; $i++)
					{
					?>
						<li>
   							<?php echo "<a class='button small' href='index.php?action=listChapters&p=$i'> $i </a>"; ?>
   						</li>
   					<?php	
    				}
    			}	
				?>
			</ul>
		</div>
	</section> 