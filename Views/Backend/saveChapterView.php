<?php $this->title = 'Le chapitre a été sauvegardé'; ?>

<p>Le chapitre a été sauvegardé !</p>
<?php if ($chapter->status == 'draft')
{
?>
    <p>Voulez-vous le publier ?</p>
    <form action="?action=publishChapter" method="post">
        <input type="hidden" name="id" value="<?= $chapter->id() ?>" />
        <input type="submit" value="Oui" name="publish" />
    </form>
    <a href="?action=adminAccess"><button>Non</button></a>
<?php 
}
else
{
?>
    <a href="?action=adminAccess"><button>Retour à l'accueil de l'administration du site</button></a>
<?php
}