<form action="?action=saveChapter" method="post" class="chapterForm">
    <p> 
        <?= isset($errors) && in_array(Chapter::INVALID_TITLE, $errors) ? 'Le titre est invalide.<br />' : '' ?>
        <label>Titre</label>
        <input type="text" name="title" value="<?= isset($chapter) ? $chapter->title : '' ?>" class="titleField" /><br />

        <?= isset($errors) && in_array(Chapter::INVALIDE_CONTENT, $errors) ? 'Le contenu est invalide.<br />' : '' ?>
        <label>Contenu</label>
        <textarea rows="20" cols="60" name="content"><?= isset($chapter) ? $chapter->content : '' ?></textarea><br />

        <?= isset($errors) && in_array(Chapter::INVALID_EXCERPT, $errors) ? 'Le résumé est invalide.<br />' : '' ?>
        <label>Résumé</label>
        <textarea rows="5" cols="60" name="excerpt"><?= isset($chapter) ? $chapter->excerpt : '' ?></textarea><br />

        <?php if(isset($chapter) && !$chapter->isNew())
        {
        ?>
            <input type="hidden" name="status" value="published" />
            <input type="hidden" name="id" value="<?= $chapter->id() ?>" />
            <input type="submit" value="Modifier" name="modify" />
        <?php
        }
        else
        {
        ?>
            <input type="submit" value="Enregistrer" />
        <?php
        } 
        ?>
    </p>
</form>