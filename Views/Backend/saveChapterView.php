<?php $this->title = 'Le chapitre a été sauvegardé'; ?>

<?php if ($chapter->status == 'draft')
{
?>
    <p>Le chapitre a été enregistré !</p>
<?php 
}
else if ($chapter->status == 'published')
{
?>
	<p>Le chapitre a été enregistré et publié !</p>
<?php
}
?>
<a href="?action=adminAccess"><button>Retour à l'accueil de l'administration du site</button></a>