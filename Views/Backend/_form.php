<form action="?action=saveChapter" method="post" id="chapterForm">
    <p> 
        <?= isset($errors) && in_array(Chapter::INVALID_TITLE, $errors) ? 'Le titre est invalide.<br />' : '' ?>
        <input type="text" name="title" placeholder="Rédiger le titre du chapitre ..." value="<?= isset($chapter) ? $chapter->title : '' ?>" class="titleField" /><br />

        <?= isset($errors) && in_array(Chapter::INVALIDE_CONTENT, $errors) ? 'Le contenu est invalide.<br />' : '' ?>
        <p><label>Contenu</label></p>
        <textarea rows="20" cols="60" name="content"><?= isset($chapter) ? $chapter->content : '' ?></textarea><br />

        <?= isset($errors) && in_array(Chapter::INVALID_EXCERPT, $errors) ? 'Le résumé est invalide.<br />' : '' ?>
        <p><label>Résumé</label></p>
        <textarea rows="5" cols="60" name="excerpt"><?= isset($chapter) ? $chapter->excerpt : '' ?></textarea><br />
    </p> 

    <?php if(isset($chapter) && !$chapter->isNew())
    {
    ?>
        <section id="checkedList">
            <fieldset class="buttonsStatus">
                <legend class="legendButtonsStatus">Enregistrer le chapitre : </legend>
                <?php if ($chapter->status == 'published')
                {
                ?>
                    <div>
                        <label for="published">Publié</label>
                        <input type="radio" id="published" name="status" value="published" checked>
                    </div>
                    <div>
                    <label for="draft">Brouillon</label>
                        <input type="radio" id="draft" name="status" value="draft">
                    </div>
                <?php
                }
                else
                {
                ?>
                    <div>
                        <label for="draft">Brouillon</label>
                        <input type="radio" id="draft" name="status" value="draft" checked>
                    </div>
                    <div>
                        <label for="published">Publié</label>
                        <input type="radio" id="published" name="status" value="published">
                </div>
                <?php   
                }
                ?>
            </fieldset>
            <?php if ($chapter->status == 'published') 
            {
            ?>
                <input type="hidden" id="current" name="publishedDate" value="current" checked>
            <?php
            }
            ?>
        </section>
        <input type="hidden" name="id" value="<?= $chapter->id() ?>" />
        <?php if ($chapter->status != 'published') 
        {
        ?> 
            <input type="hidden" id="new" name="publishedDate" value="new">
        <?php
        }
        ?>
        <div id="buttonSave">
            <input type="submit" value="Modifier" name="modify" class="buttonAdmin" />
        </div>
    <?php
    }
    else
    {
    ?>
        <fieldset class="buttonsStatus">
            <legend class="legendButtonsStatus">Enregistrer le chapitre : </legend>
            <div>
                <label for="draft">Brouillon</label>
                <input type="radio" id="draft" name="status" value="draft" checked>
            </div>
            <div>
                <label for="published">Publié</label>
                <input type="radio" id="published" name="status" value="published">
            </div>
        </fieldset>
        <input type="hidden" id="new" name="publishedDate" value="new">
        <div id="buttonSave">
            <input type="submit" value="Enregistrer" class="buttonAdmin" />
        </div>
    <?php
    } 
    ?>
</form>