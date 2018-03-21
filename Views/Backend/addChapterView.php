<?php $this->title = 'Ajouter un chapitre'; ?>

<section class="sectionAdmin">
	<h3>Ajouter un chapitre</h3>
</section>

<form action="?action=addChapter" method="post" class="chapterForm">
	<?php require 'Views/Backend/_form.php'; ?>
</form>