<?php $this->title = 'Le chapitre a été sauvegardé'; ?>

<section class="confirmationPage">
	<?php if (isset($_POST['status']))
	{
		if ($_POST['status'] == 'draft')
		{
		?>
    		<p class="confirmationPageMessage">Le chapitre a été enregistré !</p>
		<?php 
		}
		else if ($_POST['status'] == 'published')
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
	
	<a href="?action=adminAccess&p=1"><button class="buttonAdmin2">Retour à l'accueil de l'administration du site</button></a>
</section>