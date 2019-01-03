<div class="container">
    <div class="row">
        <h1 class="titlePage theme-color-text"><?= $Lang->get('SUPPORT__CREATE') ?> - <?= $Lang->get('SUPPORT__SUPPORT') ?></h1>
        <hr>
        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="./" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_create')) ?>">
            <label><?= $Lang->get('SUPPORT__SUBJECT') ?></label>
            <input type="text" name="subject" class="form-control">
            <label><?= $Lang->get('SUPPORT__CATEGORIE') ?></label>
            <select name="categorie" class="form-control">
              <?php foreach($categories as $categorie): ?>
                <option value="<?= $categorie['CategoriesSupport']['id']; ?>"><?= $categorie['CategoriesSupport']['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <label><?= $Lang->get('SUPPORT__YOURPROBLEM') ?></label>
            <?= $this->Html->script('admin/tinymce/tinymce.min.js') ?>
            <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                height : 300,
                width : '100%',
                language : 'fr_FR',
                plugins: "textcolor code image link",
                toolbar: "fontselect fontsizeselect bold italic underline strikethrough link image forecolor backcolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist outdent indent blockquote code"
             });
            </script>
            <textarea id="editor" name="reponse_text" cols="30" rows="10"></textarea>
            <hr>
            <button class="btn btn-primary" type="submit"><?= $Lang->get('SUPPORT__CREATETICKET') ?></button>
        </form>
    </div>
</div>
