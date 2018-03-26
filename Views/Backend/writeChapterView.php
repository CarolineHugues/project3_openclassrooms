<?php if(isset($chapter) && !$chapter->isNew())
    {
    	$this->title = 'Modifier le chapitre'; 
    ?>

    	<section class="sectionAdmin">
			<h3>Modifier le chapitre</h3>
		
    <?php
    }
    else
    {
   		$this->title = 'Ajouter un chapitre'; 
    ?>

    	<section class="sectionAdmin">
			<h3>Ajouter un chapitre</h3>

    <?php
    } 
    ?>

            <?php require 'Views/Backend/_form.php'; ?>
            
        </section>