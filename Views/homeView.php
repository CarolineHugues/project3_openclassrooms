<?php $title = 'Billet simple pour l\'alaska - Jean Forteroche';

ob_start(); ?>

	<header class="major">
		<h2>Présentation</h2>
	</header> 

	<p>Un livre ... </p>

<?php $content = ob_get_clean(); 

require('template.php'); ?>


