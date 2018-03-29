<?php $this->title = 'Le chapitre a été sauvegardé'; ?>

<section class="confirmationPage">
	<?php if (isset($chapter->status))
	{
		if ($chapter->status == 'draft')
		{
		?>
    		<p class="confirmationPageMessage">Le chapitre a été enregistré !</p>
		<?php 
		}
		else if ($chapter->status == 'published')
		{
		?>
			<p class="confirmationPageMessage">Le chapitre a été enregistré et publié !</p>
		<?php
		}
	}
	else 
	{
	?>
		<p class="confirmationPageMessage">Le chapitre a été enregistré !</p>
	<?php
	}
	?>
	
	<a href="?action=adminAccess"><button class="buttonAdmin2">Retour à l'accueil de l'administration du site</button></a>
</section>