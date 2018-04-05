<?php $this->title = 'Billet simple pour l\'alaska - Jean Forteroche'; ?>

	<section>
		<h2>La page que vous recherchez ne semble pas exister !</h2>
		<div id="chaptersNavigationSpace">
			<ul id="chaptersNavigation" class="actions">
				<?php
				if ($nbListChaptersPages > 1)
				{
					?>
    				<p>
						<?php if ($previousPage > 0)
						{
						 echo "<a class='button small' href='index.php?action=listChapters&p=$previousPage'> << </a>"; 
						} ?>
					</p>
					<?php for ($i = 1; $i <= $nbListChaptersPages; $i++)
					{
					?>
						<li <?php if ($_GET['p'] == $i) {echo 'class="active"';} ?>>
   							<?php echo "<a class='button small' href='index.php?action=listChapters&p=$i'> $i </a>"; ?>
   						</li>
   					<?php	
    				}
    				?>
    				<p>
    					<?php if ($nextPage <= $nbListChaptersPages)
    					{
    					 echo "<a class='button small' href='index.php?action=listChapters&p=$nextPage'> >> </a>"; 
    					} ?>
    				</p> 
    			<?php	
    			}	
				?>
			</ul>
		</div>
	</section>