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
            <fieldset>
                <legend>Enregistrer le chapitre : </legend>
                <div>
                    <?php if ($chapter->status == 'published')
                    {
                    ?>
                        <input type="radio" id="published" name="status" value="published" checked>
                        <label for="published">Publié</label> 
                    <?php
                    }
                    else
                    {
                    ?>
                        <input type="radio" id="draft" name="status" value="draft" checked>
                        <label for="draft">Brouillon</label>
                    <?php   
                    }
                    ?>
                </div>
                <div>
                    <?php if ($chapter->status == 'published')
                    {
                    ?>
                        <input type="radio" id="draft" name="status" value="draft">
                        <label for="draft">Brouillon</label>
                    <?php
                    }
                    else
                    {
                    ?>
                        <input type="radio" id="published" name="status" value="published">
                        <label for="published">Publié</label> 
                    <?php   
                    }
                    ?>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="<?= $chapter->id() ?>" />
            <input type="submit" value="Modifier" name="modify" />
        <?php
        }
        else
        {
        ?>
            <fieldset>
                <legend>Enregistrer le chapitre : </legend>
                <div>
                    <input type="radio" id="draft" name="status" value="draft" checked>
                    <label for="draft">Brouillon</label>
                </div>
                <div>
                    <input type="radio" id="published" name="status" value="published">
                    <label for="published">Publié</label>
                </div>
            </fieldset>
            <input type="submit" value="Enregistrer" />
        <?php
        } 
        ?>
    </p>
</form>